function validateUploadCover() {
  const cover = document.querySelector('#cover');
  const coverSize = (cover.files[0].size / 1024 / 1024).toFixed(2);
  const coverExtension = cover.files[0].type.split('/')[1];
  const allowedExtensions = ['jpg', 'jpeg', 'png'];

  if (coverSize > 1) {
    Swal.fire('File Too Large!', 'Max File Size: 1 MB', 'warning');
    cover.value = '';
  }

  if (!allowedExtensions.includes(coverExtension)) {
    Swal.fire('Invalid File Type!', 'Allowed File Types: jpg, jpeg, png', 'warning');
    cover.value = '';
  }
}

function deleteEbook(e) {
  e.preventDefault();
  const url = e.currentTarget.getAttribute('href');

  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!',
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = url;
    }
  });
}

function searchEbook() {
  const keyword = document.querySelector('#keyword');
  const content = document.querySelector('#content');

  fetch(`search.php?keyword=${keyword.value}`)
    .then((response) => response.text())
    .then((response) => (content.innerHTML = response));
}

function validateSignUp() {
  const username = document.querySelector('#username');
  const password = document.querySelector('#password');
  const confirmPassword = document.querySelector('#confirmPassword');

  if (username.value.length < 1) {
    username.classList.add('is-invalid');
    username.classList.remove('is-valid');
  } else if (username.value.length > 20) {
    username.classList.add('is-invalid');
  } else {
    username.classList.add('is-valid');
    username.classList.remove('is-invalid');
    username.value = username.value.toLowerCase().split(' ').join('');
  }

  if (password.value.length < 8) {
    password.classList.add('is-invalid');
    password.classList.remove('is-valid');
  } else {
    password.classList.add('is-valid');
    password.classList.remove('is-invalid');
    if (password.value !== confirmPassword.value) {
      confirmPassword.classList.add('is-invalid');
      confirmPassword.classList.remove('is-valid');
    } else {
      confirmPassword.classList.add('is-valid');
      confirmPassword.classList.remove('is-invalid');
    }
  }
}

function showPassword() {
  const password = document.querySelector('#password');
  const confirmPassword = document.querySelector('#confirmPassword');

  if (password.type === 'password') {
    password.type = 'text';
    confirmPassword.type = 'text';
  } else {
    password.type = 'password';
    confirmPassword.type = 'password';
  }
}
