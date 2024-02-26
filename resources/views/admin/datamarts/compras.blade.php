@extends('layouts.main.index')
@section('container')
  <style>
    .branding-info {
    display: none !important;
}
</style>
<div class="col-md-12 col-lg-12 order-8 mb-8">
    <div class="card h-100">
      <div class="card-body">
       <iframe width="100%" height="1020" src="https://lookerstudio.google.com/embed/reporting/fdeadb59-d043-40ad-a462-39e86e6cced9/page/QUKrD" frameborder="0" style="border:0" allowfullscreen sandbox="allow-storage-access-by-user-activation allow-scripts allow-same-origin allow-popups allow-popups-to-escape-sandbox"></iframe>
      </div>
    </div>
  </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var link = document.querySelector('.branding-info');
    if (link) {
        link.style.display = 'none';
    }
});
</script>
@endsection

