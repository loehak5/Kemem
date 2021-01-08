<footer class="footer">
  <div class="footer_content">
    <div class="container">
      <div class="row">

        <!-- About -->
        <div class="col-lg-4 footer_col">
          <div class="footer_about">
            <div class="footer_logo">
              <a href="#">
                <div class="d-flex flex-row align-items-center justify-content-start">

                  <div style="font-size: 30px;">UKM Musik Blitar Raya</div>
                </div>
              </a>
            </div>
            <div class="footer_about_text">
              <p>Kami adalah organisasi mahasiswa seni musik se-Blitar Raya yang berdiri di tahun 2018. UKM Musik Blitar Raya sendiri bisa diesebut juga
                pemersatu dari beberapa Unit Kegiatan Mahasiswa Univ, ST, Institut di seluruh Kota Blitar.</p>
            </div>
          </div>
        </div>
        <!-- Footer Contact -->
        <div class="col-lg-4 footer_col">
          <div class="footer_contact">
            <div class="footer_social">
              <div class="footer_title">Social</div>
              <ul class="footer_social_list d-flex flex-row align-items-start justify-content-start">
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer_bar">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="footer_bar_content d-flex flex-md-row flex-column align-items-center justify-content-start">
            <div class="copyright order-md-1 order-2">
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              <b>UKM Musik</b> Blitar Raya &copy; <script>
                document.write(new Date().getFullYear());
              </script> | Design by <a href="https://www.instagram.com/m.lukhak/" target="_blank">LuqmanHakim</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </div>
            <nav class="footer_nav ml-md-auto order-md-2 order-1">
              <ul class="d-flex flex-row align-items-center justify-content-start">
                <!-- <li><a href="category.html">Women</a></li>
										<li><a href="category.html">Men</a></li>
										<li><a href="category.html">Kids</a></li>
										<li><a href="category.html">Home Deco</a></li>
										<li><a href="#">Contact</a></li> -->
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
</div>

</div>

<script src="<?php echo base_url() ?>assets/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/styles/bootstrap-4.1.2/popper.js"></script>
<script src="<?php echo base_url() ?>assets/styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/greensock/TweenMax.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/greensock/TimelineMax.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/greensock/animation.gsap.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/easing/easing.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/progressbar/progressbar.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/parallax-js-master/parallax.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/custom.js"></script>
<script src="<?php echo base_url() ?>assets/js//jquery.dataTables.min.js' ?>"></script>
<script src="<?php echo base_url() ?>assets/js//moment.js' ?>"></script>



<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>


<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
  });
</script>



<script>
  $('#exampleModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var recipient = button.data('isi')
    var modal = $(this)

    modal.find('.modal-body input').val(recipient)
  })
</script>

<script type="text/javascript">
  var conHeight = $(".konten").height();
  var imgHeight = $(".konten img").height();
  var gap = (imgHeight - conHeight) / 2;
  $(".konten img").css("margin-top", -gap);
</script>

<script>
  $(function() {
    $('#datepicker').datepicker({
      autoclose: true
    });
  });
</script>

<script>
  $(document).ready(function() {});
</script>

<script>
  $('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
  });
</script>






<script type="text/javascript">
  Highcharts.chart('penjualan', {
    chart: {
      type: 'line'
    },
    title: {
      text: 'Data Jumlah Penjualan 2019'
    },
    subtitle: {
      text: 'Source: DjengART.com'
    },
    xAxis: {
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
      title: {
        text: 'Temperature (°C)'
      }
    },
    plotOptions: {
      line: {
        dataLabels: {
          enabled: true
        },
        enableMouseTracking: true
      }
    },
    series: [{
      name: 'Penjualan',
      data: [7, 7, 14, 4, 25, 0, 22, 22, 67, 12, 43, 2]
    }]
  });
</script>
<script type="text/javascript">
  function svgasimg() {
    return document.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#Image", "1.1");
  }
  if (!svgasimg()) {
    var e = document.getElementsByTagName("img");
    if (!e.length) {
      e = document.getElementsByTagName("IMG");
    }
    for (var i = 0, n = e.length; i < n; i++) {
      var img = e[i],
        src = img.getAttribute("src");
      if (src.match(/svgz?$/)) {
        /* URL ends in svg or svgz */
        img.setAttribute("src", img.getAttribute("data-fallback"));
      }
    }
  }
</script>
<script>
  $(document).ready(function() {
    $('#mydata').DataTable();
  });
</script>

<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>

<script>
  // Get the modal
  var modal = document.getElementById("myModal");

  // Get the button that opens the modal
  var btn = document.getElementById("myBtn<?php echo base_url() ?>diman/edit_pemesanan/<?php echo $value['id']; ?>");

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks the button, open the modal 
  btn.onclick = function() {
    modal.style.display = "block";
  }

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>
<script type="text/javascript">
  var rupiah = document.getElementById('rupiah');
  rupiah.addEventListener('keyup', function(e) {
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    rupiah.value = formatRupiah(this.value, 'Rp. ');
  });

  /* Fungsi formatRupiah */
  function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
      split = number_string.split(','),
      sisa = split[0].length % 3,
      rupiah = split[0].substr(0, sisa),
      ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
      separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
  }
</script>
<script>
  $(function() {
    $('#only-number').on('keydown', '#number', function(e) {
      -1 !== $
        .inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) || /65|67|86|88/
        .test(e.keyCode) && (!0 === e.ctrlKey || !0 === e.metaKey) ||
        35 <= e.keyCode && 40 >= e.keyCode || (e.shiftKey || 48 > e.keyCode || 57 < e.keyCode) &&
        (96 > e.keyCode || 105 < e.keyCode) && e.preventDefault()
    });
  })
</script>


</body>

</html>