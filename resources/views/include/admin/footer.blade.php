
<footer class="footer ">
    <div class="container-fluid d-flex justify-content-between">
      <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">This is Admin Panel</span>
      <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"> Created by Maqsood with lots of love </span>
    </div>
</footer>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js" integrity="sha512-bztGAvCE/3+a1Oh0gUro7BHukf6v7zpzrAb3ReWAVrt+bVNNphcl2tDTKCBr5zk7iEDmQ2Bv401fX3jeVXGIcA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
  $(document).ready(function() {
      $('.select2').select2({
          placeholder: 'Search for a model',
          allowClear: true,
          width: '100%'
      });
  });

 
  $(document).ready(function() {
    // Function to get or set localStorage value
    function getLocalStorageItem(key) {
        return localStorage.getItem(key);
    }

    function setLocalStorageItem(key, value) {
        localStorage.setItem(key, value);
    }

    // Restore selected base model from localStorage on page load
    var selectedBaseModel = getLocalStorageItem('selectedBaseModel');
    if (selectedBaseModel) {
        $('#model_select').val(selectedBaseModel);
    }

    // Handle brand selection change
    $('#brand_select').on('change', function() {
        var brandId = $(this).val();
    
        if (brandId) {

            $.ajax({
                url: '/modelss', // Adjust URL to your endpoint for fetching models
                type: 'GET',
                data: { brand_id: brandId },
                success: function(data) {
                
                    $('#model_select').empty();
                    $('#model_select').append('<option value="">Select Model</option>');
                    $.each(data, function(key, value) {
                    
                        $('#model_select').append('<option value="' + key + '">' + value + '</option>');
                    });

                    // If there was a previously selected model, restore it
                    var selectedModel = getLocalStorageItem('selectedBaseModel');
                    if (selectedModel) {
                        $('#model_select').val(selectedModel);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    conosle.log('models faild');
                    console.error('Error: ' + textStatus + ', ' + errorThrown);
                }
            });
        } else {
            console.log('brand empty');
            $('#model_select').empty();
            $('#model_select').append('<option value="">Select Model</option>');

            // Clear localStorage when no brand is selected
            localStorage.removeItem('selectedBaseModel');
        }
    });

    // Handle model selection change
    $('#model_select').on('change', function() {
        var selectedModel = $(this).val();
        if (selectedModel) {
            // Store selected model in localStorage
            setLocalStorageItem('selectedBaseModel', selectedModel);
        } else {
            // Clear localStorage if no model is selected
            localStorage.removeItem('selectedBaseModel');
        }
    });

});

</script>