<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Autocomplete with Database Fetch</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
  /* Custom styles for autocomplete */
  .suggestions-list {
    list-style-type: none;
    padding: 0;
    margin-top: 5px;
    box-shadow: 0 5px 10px rgba(0,0,0,0.2);
    border: 1px solid #ccc;
    border-radius: 4px;
  }
  
  .suggestion-item {
    display: flex;
    align-items: center;
    padding: 10px;
    cursor: pointer;
  }
  
  .suggestion-item img {
    width: 30px;
    height: 30px;
    margin-right: 10px;
    border-radius: 50%;
  }
  
  .suggestion-item:hover {
    background-color: #f2f2f2;
  }
</style>
</head>
<body>

<div class="container-fluid" style="margin-bottom: 20px">
  <div class="row justify-content-center">
    <div class="col-md-4 col-sm-6 mb-3 mb-sm-0">
      <input id="searchFirst" type="text" class="form-control placeholder-hide" placeholder="Search First Product">
      <ul id="searchFirstSuggestions" class="suggestions-list"></ul>
      <input id="searchFirstMobile" type="text" class="form-control placeholder-show mt-2 mt-sm-0" placeholder="Search First Mobile">
    </div>
    <div class="col-md-4 col-sm-6 mb-3 mb-sm-0">
      <input id="searchSecond" type="text" class="form-control placeholder-hide" placeholder="Search Second Product">
      <ul id="searchSecondSuggestions" class="suggestions-list"></ul>
      <input id="searchSecondMobile" type="text" class="form-control placeholder-show mt-2 mt-sm-0" placeholder="Search Second Mobile">
    </div>
    <div class="col-md-2 col-sm-6 d-block d-md-none mt-2">
      <button type="submit" class="btn btn-primary btn-block">Compare</button>
    </div>
    <div class="col-md-2 col-sm-6 d-none d-md-block">
      <button type="submit" class="btn btn-primary btn-block">Compare</button>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
  // Function to fetch data from database (simulated with a static array)
  function fetchData(query, callback) {
    // Simulated data array (replace with actual fetch from database)
    const data = [
      { name: "Product 1", image: "https://via.placeholder.com/30" },
      { name: "Product 2", image: "https://via.placeholder.com/30" },
      { name: "Product 3", image: "https://via.placeholder.com/30" },
      { name: "Product 4", image: "https://via.placeholder.com/30" },
      { name: "Product 5", image: "https://via.placeholder.com/30" }
    ];

    // Simulate async behavior
    setTimeout(function() {
      const filteredData = data.filter(item =>
        item.name.toLowerCase().includes(query.toLowerCase())
      );
      callback(filteredData);
    }, 300); // Simulate delay
  }

  // Function to handle autocomplete
  function handleAutocomplete(input, suggestionsList) {
    input.on('input', function() {
      const query = $(this).val();
      if (!query) {
        suggestionsList.empty();
        return;
      }
      fetchData(query, function(data) {
        suggestionsList.empty();
        data.forEach(item => {
          const li = $('<li>').addClass('suggestion-item')
                              .append($('<img>').attr('src', item.image))
                              .append($('<span>').text(item.name));
          li.on('click', function() {
            input.val(item.name);
            suggestionsList.empty();
          });
          suggestionsList.append(li);
        });
      });
    });

    $(document).on('click', function(e) {
      if (!input.is(e.target) && input.has(e.target).length === 0) {
        suggestionsList.empty();
      }
    });
  }

  // Initialize autocomplete for each input
  handleAutocomplete($('#searchFirst'), $('#searchFirstSuggestions'));
  handleAutocomplete($('#searchSecond'), $('#searchSecondSuggestions'));
});
</script>

</body>
</html>
