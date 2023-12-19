document.querySelectorAll('.select-subcategory').forEach(function (element) {
    element.addEventListener('click', function () {
     alert('hello');

     var subcategoryId = element.getAttribute('data-subcategory-id');
      console.log(subcategoryId);      
     // Assuming you want to send some data to the server
     var requestData = {
         subcategoryId: subcategoryId,
         _token: '{{ csrf_token() }}', // Add Laravel CSRF token
     };

     fetch('/your-endpoint', {
         method: 'POST',
         headers: {
             'Content-Type': 'application/json',
         },
         body: JSON.stringify(requestData),
     })
     .then(response => response.json())
     .then(data => {
         // Handle the response data
         console.log(data.message);
         console.log(data.data);
     })
     .catch(error => {
         // Handle errors
         console.error('Error in AJAX request', error);
     });
    });
});