@include('_head')

<body>
  @include('_header')
  <div class="container full-width">
    <div class="row">
      <div class="column left">
        <h2>Show Data</h2>
      </div>
      <div class="column right">
        <h2><a href="{{ url('/company') }}">Go Back</a></h2>
      </div>
    </div>
    <section class="intro row">
      <table id="records" class="table table-bordered table-striped">
        <tr>
          <th>Date</th>
          <th>open</th>
          <th>high</th>
          <th>low</th>
          <th>close</th>
          <th>volume</th>
        </tr>
        <tr>
          <td colspan="6">NO Data</td>
        </tr>
      </table>
    </section>
</body>
</html>