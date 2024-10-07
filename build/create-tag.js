import axios from 'axios';
import fetch from 'node-fetch';
import { execSync } from 'child_process';

const GITHUB_TOKEN = process.env.GITHUB_TOKEN; // توکن را از محیط دریافت می‌کند
const REPO_OWNER = 'cyandm'; // نام کاربری شما در گیت‌هاب
const REPO_NAME = 'eurotech'; // نام ریپازیتوری شما

async function getLatestCommitSHA(repo, branch, token) {
	try {
		console.log(`Fetching SHA for branch: ${branch} in repo: ${repo}`);
		const response = await fetch(
			`https://api.github.com/repos/${repo}/git/refs/heads/${branch}`,
			{
				headers: {
					Authorization: `token ${token}`,
					Accept: 'application/vnd.github.v3+json',
				},
			}
		);

		if (!response.ok) {
			throw new Error(
				`Failed to fetch latest commit SHA: ${response.status} ${response.statusText}`
			);
		}

		const data = await response.json();
		return data.object.sha; // بازگشت SHA آخرین کامیت
	} catch (error) {
		console.error(`Error in getLatestCommitSHA: ${error.message}`);
		throw error; // این خطا را دوباره پرتاب می‌کنیم تا در جاهای دیگر مدیریت شود
	}
}

async function getCommitMessage(repo, sha, token) {
	try {
		const response = await fetch(
			`https://api.github.com/repos/${repo}/commits/${sha}`,
			{
				headers: {
					Authorization: `token ${token}`,
					Accept: 'application/vnd.github.v3+json',
				},
			}
		);

		if (!response.ok) {
			throw new Error('Failed to fetch commit message');
		}

		const data = await response.json();
		return data.commit.message; // بازگشت پیام کامیت
	} catch (error) {
		console.error(`Error in getCommitMessage: ${error.message}`);
		throw error; // این خطا را دوباره پرتاب می‌کنیم
	}
}

async function createRelease(tagname, sha) {
	try {
		// ایجاد تگ جدید
		await axios.post(
			`https://api.github.com/repos/${REPO_OWNER}/${REPO_NAME}/git/refs`,
			{
				ref: `refs/tags/${tagname}`,
				sha: sha, // استفاده از SHA مربوط به برنچ dev
			},
			{
				headers: {
					Authorization: `token ${GITHUB_TOKEN}`,
					'Content-Type': 'application/json',
				},
			}
		);

		// ایجاد ریلیز
		await axios.post(
			`https://api.github.com/repos/${REPO_OWNER}/${REPO_NAME}/releases`,
			{
				tag_name: tagname,
				name: tagname,
				body: 'Release created automatically via GitHub Actions',
			},
			{
				headers: {
					Authorization: `token ${GITHUB_TOKEN}`,
					'Content-Type': 'application/json',
				},
			}
		);

		console.log(`Release ${tagname} created successfully.`);
	} catch (error) {
		console.error(
			`Error: ${error.response ? error.response.data.message : error.message}`
		);
	}
}

(async () => {
	const branch = 'dev'; // نام برنچ
	try {
		const sha = await getLatestCommitSHA(REPO_NAME, branch, GITHUB_TOKEN); // دریافت SHA آخرین کامیت برنچ dev
		const commitMessage = await getCommitMessage(REPO_NAME, sha, GITHUB_TOKEN);
		const TAG_NAME = commitMessage; // استفاده از پیام کامیت به عنوان نام تگ

		await createRelease(TAG_NAME, sha);
	} catch (error) {
		console.error(`Error in main execution: ${error.message}`);
	}
})();
