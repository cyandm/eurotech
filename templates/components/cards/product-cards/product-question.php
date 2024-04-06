<?php
$question_set = [];
$answer_set = [];

for ($i = 1; $i <= 5; $i++) {
    $question = get_field($i . '_question');
    if (isset($question) && $question != '')
        array_push($question_set, $question);

    $answer = get_field($i . '_answer');
    if (isset($answer) && $answer != '')
        array_push($answer_set, $answer);
}
?>
<?php if (count($question_set) > 0 && count($answer_set) > 0) : ?>

    <div class="tab" id="tab4">frequently asked question</div>

    <div id="tab4Content" class="tab-content">
        <div>
            <div>
                <p class="question">
                    <?= "" !== $question_set[0] ? "1." . $question_set[0] : ""; ?>
                </p>
                <p class="answer">
                    <?= "" !== $answer_set[0] ? $answer_set[0] : ""; ?>

                </p>
            </div>
            <div>
                <p class="question">
                    <?= "" !== $question_set[1] ? "2." . $question_set[1] : ""; ?>
                </p>
                <p class="answer">
                    <?= "" !== $answer_set[1] ? $answer_set[1] : ""; ?>
                </p>
            </div>
            <div>
                <p class="question">
                    <?= "" !== $question_set[2] ? "2." . $question_set[2] : ""; ?>
                </p>
                <p class="answer">
                    <?= "" !== $answer_set[2] ? $answer_set[2] : ""; ?>
                </p>
            </div>
            <div>
                <p class="question">
                    <?= "" !== $question_set[3] ? "1." . $question_set[3] : ""; ?>
                </p>
                <p class="answer">
                    <?= "" !== $answer_set[3] ? $answer_set[3] : ""; ?>
                </p>
            </div>
            <div>
                <p class="question">
                    <?= "" !== $question_set[4] ? "1." . $question_set[4] : ""; ?>
                </p>
                <p class="answer">
                    <?= "" !== $answer_set[4] ? $answer_set[4] : ""; ?>
                </p>
            </div>
        </div>
    </div>
<?php endif; ?>