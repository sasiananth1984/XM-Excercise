@include('_head')

<body>
   @include('_header')
   <!-- Page content-->
   <div class="container">
      <div class="text-center mt-5">
         <h1>Get Historical Data</h1> 
         <p>( Ex : Select AAPL for Test Data)</p>
      </div>
      <form method="post" action="{{ URL::to('/company') }}" id="companyForm">
         <!-- CROSS Site Request Forgery Protection -->
         @csrf
         <div class="form-group">
            <label>Company symbol</label>
            <select name="symbol" class="form-control" id="symbol">
               @foreach ($symbols as $syms)
               <option value="{{ $syms }}">{{$syms}}</option>
               @endforeach
            </select>
         </div>
         <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" id="email" required>
         </div>
         <div class="form-group">
            <label class="col-xs-3 control-label">Start date</label>
            <div class="col-xs-5">
               <input type="text" class="form-control" name="start_date" id="start_date" required />
            </div>
         </div>
         <div class="form-group">
            <label class="col-xs-3 control-label">End date</label>
            <div class="col-xs-5">
               <input type="text" class="form-control" name="end_date" id="end_date" required />
            </div>
         </div>
         <div class="form-group display-hide">
            <label>Message</label>
            <textarea class="form-control hide" name="message" id="message" rows="4" required></textarea>
         </div>
         <input type="hidden" name="_token" value="{{ csrf_token() }}">
         <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
      </form>
      
   </div>
</body>

</html>