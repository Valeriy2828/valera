<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, maximum-scale=1">
     <title>Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<!--<script src="{{ asset('assets/js/jquery.min.js') }}"></script> -->

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!--<script src="{{ asset('assets/js/responsiveslides.min.js') }}"></script> @stack('styles')-->

   
</head>
<body>
<div style="margin: 200px 0px 0px 650px ";>
	<div class="col-lg-10" >
		<div class="col-7">
			<div><h2>Форма</h2></div>                      
		</div>
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
		<form method="post" action="/form/add">
			{{ csrf_field() }}
			<div class="col-5">
				<div>				
					<div class="form-group">
						<input type="text" class="form-control" id="exampleFormControlInput1" name="name" value="{{ old('name')? old('name'): null }}" placeholder="Name">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{ old('email')? old('email'): null }}" placeholder="Email">

					</div>										
					<select class="form-control" name="region" id="region">	
					<option disabled selected>Выберите область</option>					
					@foreach($region as $key => $regions)					
					  <option value="{{ $regions->code }}">{{ $regions->name }}</option>	
				    @endforeach 
					</select>
					
					<div class="form-group city-select" style="display: none;">
					<select class="form-control" id="city" name="city" style="margin-top: 20px;">
						<option disabled>Выберите город</option>
					</select>
					</div>
					
					<script>
					$(function(){
						 $('#region').change(function(){
						  var code = $(this).val();
						  $('#city').load('getCities', {code: code}, function(){
						 $('.city-select').fadeIn('slow');
						  });

						 });
					});
					
					</script>
					
						
					
					<input type="submit" class="btn btn-primary" value="Отправить" style="margin-top: 20px;">
				</div>				
			</div>
		</form>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
    