document.querySelectorAll('.select-subcategory').forEach(function (element) {
    element.addEventListener('click', function () {
    //  alert('hello');

     var subcategoryId = element.getAttribute('data-subcategory-id');
    //   console.log(subcategoryId);      
     // Assuming you want to send some data to the server
     var requestData = {
         subcategoryId: subcategoryId,
         _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content'), // Add Laravel CSRF token
     };

     fetch('/subcategory', {
         method: 'POST',
         headers: {
             'Content-Type': 'application/json',
         },
         body: JSON.stringify(requestData),
     })
     .then(response => response.json())
     .then(data => {
         // Replace the content of the #ajaxContent div with the new content
         document.getElementById('ajaxContent').innerHTML = data.html;
         console.log(data);
        //  console.log(data.data);
     })
     .catch(error => {
         // Handle errors
         console.error('Error in AJAX request', error);
     });
     
    });
});