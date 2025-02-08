document.getElementById('uploadForm').addEventListener('submit', function(e) {
    e.preventDefault();
  
    // Create FormData and append the selected file
    const formData = new FormData();
    const fileInput = document.getElementById('xmlFile');
    formData.append('xmlFile', fileInput.files[0]);
  
    // Send the file to the server for validation
    fetch('/upload', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      const resultDiv = document.getElementById('result');
      // Clear previous results
      resultDiv.innerHTML = '';
      resultDiv.classList.remove('success', 'error');
  
      if (data.valid) {
        // Create a success message
        resultDiv.classList.add('success');
        const successMsg = document.createElement('p');
        successMsg.textContent = '✅ XML is valid!';
        resultDiv.appendChild(successMsg);
      } else {
        // Create an error message block
        resultDiv.classList.add('error');
        const errorMsg = document.createElement('p');
        errorMsg.textContent = '❌ Validation Errors:';
        resultDiv.appendChild(errorMsg);
  
        const ul = document.createElement('ul');
        data.errors.forEach(error => {
          const li = document.createElement('li');
          li.textContent = error;
          li.classList.add('error');
          ul.appendChild(li);
        });
        resultDiv.appendChild(ul);
      }
    })
    .catch(error => {
      console.error('Error:', error);
      const resultDiv = document.getElementById('result');
      resultDiv.innerHTML = '';
      resultDiv.classList.remove('success', 'error');
      resultDiv.classList.add('error');
      const errorMsg = document.createElement('p');
      errorMsg.textContent = '⚠️ An error occurred during validation.';
      resultDiv.appendChild(errorMsg);
    });
  });
  