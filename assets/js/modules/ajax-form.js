export const ajaxSendForm = (formEl, action) => (e) => {
  e.preventDefault();
  // changeButtonStatus('pending', e.submitter);

  const formData = new FormData(e.currentTarget, e.submitter);

  formData.append('action', action);
  formData.append('_nonce', cyn_head_script.nonce);

  jQuery(($) => {
    $.ajax({
      type: 'POST',
      url: cyn_head_script.url,
      cache: false,
      processData: false,
      contentType: false,
      data: formData,

      success: (res) => {
        formEl.reset();
        // showMassage('success', formEl);
        // changeButtonStatus('success', e.submitter);
      },
      error: () => {
        // showMassage('error', formEl);
        // changeButtonStatus('success', e.submitter);
      },
    });
  });
};

export const ContactUs = () => {
  const contactUsPage = document.getElementById('contactUsPage');
  const contactForm = document.getElementById('contactForm');

  if (!contactUsPage) return;
  contactForm.addEventListener(
    'submit',
    ajaxSendForm(contactForm, 'cyn_contact_us_form')
  );
};

ContactUs();
