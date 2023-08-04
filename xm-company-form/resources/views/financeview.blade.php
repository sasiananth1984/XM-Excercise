@include('_head')
<body>
  @include('_header')
  <div class="container full-width">
    <div class="row">
      <div class="column left">
        <h2>Show Data</h2>
      </div>
      <div class="column right">
        <h2><a href="{{ url('/chart') }}">Show Chart</a></h2>
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
        <?php foreach ($data as $result) { ?>
          <tr><?php
              $date = isset($result['date']) ? $result['date'] : '';
              $open = isset($result['open']) ? $result['open'] : '';
              $high = isset($result['high']) ? $result['high'] : '';
              $low = isset($result['low']) ? $result['low'] : '';
              $close = isset($result['close']) ? $result['close'] : '';
              $volume = isset($result['volume']) ? $result['volume'] : '';
              echo "<td>" . $date . "</td>" . "<td>" . $open . "</td>" . "<td>" . $high . "</td>" . "<td>" . $low . "</td>" . "<td>" . $close . "</td><td>" . $volume . "</td></tr>";
            } ?>
      </table>
    </section>
    <script src="{{ asset('js/paging.js') }}"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#records').paging({
          limit: 20
        });
      });
    </script>
</body>
</html>