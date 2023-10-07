<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="css/styles.css">
    <title>Enregistrement de Présence</title>
</head>
<body>

<div class="container mt-5">
    <h2 class="titre">Marquer votre présence</h2>

    @if(session('status'))
        <div class="alert alert-success mt-3">
            {{ session('status') }}
        </div>
    @endif
    <section class="vh-100">
        <div class="container-fluid h-custom">
          <div class="row d-flex justify-content-center  pt-5 h-100">
            
            
            <div class="container">
              <div class="mb-3">
                <label for="dateFilter" class="form-label">Choisir une Date:</label>
                <input type="date" class="form-control" id="dateFilter">
              </div>
               <table class="table">
                <thead>
                  <tr>
                    <th>Nom</th>
                    <th>Prenoms</th>
                    <th>Numero</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody id="myTable">
                  @foreach ($liste as $item)
                  <tr>
                    <td>{{$item->nom}}</td>
                    <td>{{$item->prenoms}}</td>
                    <td>{{$item->numero}}</td>
                    <td> {{ $item->date }}</td>
                  </tr>    
                  @endforeach
                     
              
                  
                </tbody>
              </table>
            </div>
              
          </div>
        </div>
        <br><br>
        
      </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-oTl6M6AEahfP6M5dTNHIwMpF8e8FV6Z2qIcFuWMGx8Q+YB/6a6Mk5XVoZGtWHA" crossorigin="anonymous"></script>
<script>
  document.getElementById('dateFilter').addEventListener('input', function () {
    var filterDate = this.value;
    console.log(filterDate);
    var rows = document.getElementById('myTable').getElementsByTagName('tr');

    for (var i = 0; i < rows.length; i++) {
      var date = rows[i].getElementsByTagName('td')[3].innerText;

      if (date.includes(filterDate)) {
        console.log('e');
        rows[i].style.display = '';
      } else {
        console.log('a');
        rows[i].style.display = 'none';
      }
    }
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

