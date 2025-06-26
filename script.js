function fun() {
  let valid = true;
  let name = document.getElementById('un').value;
  if (name.length < 3) {
    document.getElementById('eun').innerHTML = '<br>Name must be at least 3 characters';
    document.getElementById('eun').style.color = 'red';
    document.getElementById('un').style.border = '2px solid red';
    document.getElementById('un').style.borderRadius = '5px';
    valid = false;
    event.preventDefault();
  }

  let email = document.getElementById('email').value;
  let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(email)) {
    document.getElementById('ema').innerHTML = '<br>Please enter a valid email';
    document.getElementById('ema').style.color = 'red';
    document.getElementById('email').style.border = '2px solid red';
    document.getElementById('email').style.borderRadius = '5px';
    valid = false;
    event.preventDefault();
  }
  let pass = document.getElementById('pass').value;
  if (pass.length < 6) {
    document.getElementById('psu').innerHTML = '<br>password must be 6 characters';
    document.getElementById('psu').style.color = 'red';
    document.getElementById('pass').style.border = '2px solid red';
    document.getElementById('pass').style.borderRadius = '5px';
    valid = false;
    event.preventDefault();
  }

  let current_pass = document.getElementById('cpass').value;
  if (current_pass != pass || current_pass == 0) {
    alert('password not matched');
    document.getElementById('cpass').style.border = '2px solid red';
    document.getElementById('cpass').style.borderRadius = '5px';
    valid = false;
    event.preventDefault();
  }

  if (valid) {
    alert('Form is valid and ready to submit');
  }
}