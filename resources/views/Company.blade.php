<style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
<form method="post" action="{{ route('Companyinfo',['id'=>$Company->id]) }}">
{{ csrf_field()  }}
   Enter The Company Name: <input type="text" name="title"  value="" ></br>
    The Address:<input type="text" name="address" value=""></br>
  Phone:  <input type="string" name="phone" value=""></br>
<input type="submit" value="ADD Company">
</form>
