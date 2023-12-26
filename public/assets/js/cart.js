  
    $(".update-cart").change(function (e) {
        e.preventDefault();
  
        var ele = $(this);
        var updateCarroute = ele.data('update-cart-route');
        console.log(updateCarroute );
        console.log('data-id:', ele.parents("tr").attr("data-id"));
        console.log(ele.parents("tr").find(".quantity").val());
        $.ajax({
            url: "{{ route('update-cart') }}",
            method: "patch",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                // _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
                
            },
            
            success: function (response) {
                console.log('Response:', response);
                // console.error('Status:', response);
            //    window.location.reload();
            }
            
        });
    });
  
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
        var removeCarroute = $(this).data('remove-cart-route');
        var ele = $(this);
        console.log( removeCarroute);
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: removeCarroute,
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
