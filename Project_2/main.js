const form = document.getElementById('regForm');
const statusMessage = document.getElementById('statusMessage');

function setStatus(message, type) {
  statusMessage.textContent = message;
  statusMessage.classList.remove('error', 'success');
  if (type) {
    statusMessage.classList.add(type);
  }
}

function populateDateSelects() {
  const daySelect = document.getElementById('dobDay');
  const yearSelect = document.getElementById('dobYear');

  for (let day = 1; day <= 31; day += 1) {
    const option = document.createElement('option');
    option.value = String(day);
    option.textContent = String(day);
    daySelect.appendChild(option);
  }

  const currentYear = new Date().getFullYear();
  for (let year = currentYear - 14; year >= 1950; year -= 1) {
    const option = document.createElement('option');
    option.value = String(year);
    option.textContent = String(year);
    yearSelect.appendChild(option);
  }
}

function validatePercentageFields() {
  const pctFields = document.querySelectorAll('.pct-input');
  const pctPattern = /^\d{1,3}(\.\d{1,2})?$/;

  pctFields.forEach((field) => {
    const value = field.value.trim();
    if (!value) {
      return;
    }
    if (!pctPattern.test(value) || Number(value) > 100) {
      throw new Error('Percentage values must be numbers between 0 and 100, with up to 2 decimal places.');
    }
  });
}

function validateForm() {
  const firstName = document.getElementById('firstName').value.trim();
  const lastName = document.getElementById('lastName').value.trim();
  const email = document.getElementById('email').value.trim();
  const mobile = document.getElementById('mobile').value.trim();
  const gender = document.querySelector('input[name="gender"]:checked');
  const course = document.querySelector('input[name="course"]:checked');

  if (!firstName) {
    throw new Error('Please enter your first name.');
  }
  if (!lastName) {
    throw new Error('Please enter your last name.');
  }
  if (!email.includes('@')) {
    throw new Error('Please enter a valid email address.');
  }
  if (!/^\d{10,15}$/.test(mobile)) {
    throw new Error('Mobile number must be 10 to 15 digits.');
  }
  if (!gender) {
    throw new Error('Please select your gender.');
  }
  if (!course) {
    throw new Error('Please select a course.');
  }

  validatePercentageFields();

  return {
    firstName,
    lastName,
    email,
    course: course.value
  };
}

form.addEventListener('submit', (event) => {
  event.preventDefault();

  try {
    const data = validateForm();
    setStatus(
      `Registration submitted successfully for ${data.firstName} ${data.lastName} (${data.course}).`,
      'success'
    );
  } catch (error) {
    setStatus(error.message, 'error');
  }
});

form.addEventListener('reset', () => {
  setStatus('', '');
});

populateDateSelects();