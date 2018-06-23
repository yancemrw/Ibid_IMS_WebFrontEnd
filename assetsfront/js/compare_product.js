// check if compare product set
var getlocal = getLocalStorage = JSON.parse(localStorage.getItem('CP'));
if(getlocal !== undefined && getlocal !== null) {
   setTimeout(function() {
      if(document.getElementById('addcompare') !== null) {
         document.getElementById('addcompare').style.display = 'block';
      }
   }, 1500);
}
else {
   var contents = '<div class="text-align-center width-unset">'+
                  '<div>'+
                  '<img src="'+img_empty+'" alt="" title="">'+
                  '</div>'+
                  '<p>Oops.... <span>Data Perbandingan Tidak Ada.</span></p>'+
                  '</div>';
   setTimeout(function() {
      localStorage.removeItem("CP");
      $('#loadContent').children().replaceWith(contents);
   }, 1000);
}

function setCompare(linked) {
   var content = '', getLocalStorage = JSON.parse(localStorage.getItem('CP'));
   if(getLocalStorage !== null) {
      for(var i = 0; i < getLocalStorage.length; i++) {
         var AuctionItemId = getLocalStorage[i].AuctionItemId;
         var Merk = getLocalStorage[i].Merk;
         var Seri = getLocalStorage[i].Seri;
         var Silinder = getLocalStorage[i].Silinder;
         var Tipe = getLocalStorage[i].Tipe;
         var Model = getLocalStorage[i].Model;
         var Transmisi = getLocalStorage[i].Transmisi;
         content += '<div class="box-compare">'+
                     '<a href="#">'+
                     '<div class="thumbnail"><img src="'+getLocalStorage[i].Image+'" />'+
                     '<div class="overlay-grade">Grade <span>'+getLocalStorage[i].TaksasiGrade+'</span></div>'+
                     '</div>'+
                     '<h2>'+Merk+' '+Seri+' '+Silinder+' '+Tipe+'<br>'+Model+' '+Transmisi+'</h2>'+
                     '<span class="price">Rp. '+currency_format(getLocalStorage[i].Price)+'</span>'+
                     '</a>'+
                     '<div class="overlay-compare">'+
                     '<p>Apakah Anda yakin untuk menghapus atau menggantinya ?</p>'+
                     '<button class="btn btn-red" onclick="remove_product('+AuctionItemId+', \''+linked+'\')">Hapus</button>'+
                     '</div>'+
                     '</div>';
      }
      if(getLocalStorage.length < 4) {
         var numempty = (4 - getLocalStorage.length);
         for(var i = 0; i < numempty; i++) {
            content += '<div class="box-compare add-compare-box">'+
                        '<a href="javascript:void(0)" class="cursor-default"><i class="fa fa-plus-circle"></i></a>'+
                        '</div>';
         }
      }
   }
   else {
      for(var i = 0; i < 4; i++) {
         content += '<div class="box-compare add-compare-box">'+
                     '<a href="javascript:void(0)"><i class="fa fa-plus-circle"></i></a>'+
                     '</div>';
      }
   }
   content += '<div class="box-compare button-compare">'+
               '<p>Untuk memulai perbandingan silakan klik button di bawah ini</p>'+
               '<button class="btn btn-green btn-compare" onclick="location.href=\''+linked+'\'" type="button">Bandingkan</button>'+
               '</div>';
   $('#loadContent').html(content);
}

function setComparePage(img_empty) {
   var getLocalStorage = JSON.parse(localStorage.getItem('CP')), content = '';
   if(getlocal !== undefined && getlocal !== null) {
      if(getLocalStorage.length > 0) {
         for(var i = 0; i < getLocalStorage.length; i++) {
            var AucId = getLocalStorage[i].AuctionItemId;
            var Merk = getLocalStorage[i].Merk;
            var Seri = getLocalStorage[i].Seri;
            var Silinder = getLocalStorage[i].Silinder;
            var Tipe = getLocalStorage[i].Tipe;
            var Model = getLocalStorage[i].Model;
            var Transmisi = getLocalStorage[i].Transmisi;
            var Lot = (getLocalStorage[i].Lot != null) ? getLocalStorage[i].Lot : '???';
            var Warna = (getLocalStorage[i].Warna != null) ? getLocalStorage[i].Warna : 'Tidak Diketahui';
            var Stnk = (getLocalStorage[i].NoSTNK != '0') ? getLocalStorage[i].NoSTNK : 'Tidak Diketahui';
            content += '<div class="col-md-3 item width-100">'+
                     '<div class="list-product box-recommend list-compare">'+
                     '<a href="javascript:void(0);">'+
                     '<div class="thumbnail">'+
                     '<div class="background-cover minimal-height thumnail-custom" style="background: url('+getLocalStorage[i].Image+') no-repeat center center"></div>'+
                     '<div class="overlay-grade">Grade <span>'+getLocalStorage[i].TaksasiGrade+'</span></div>'+
                     '<p class="overlay-lot">LOT '+Lot+'</p>'+
                     '<a href="javascript:void(0)" onclick="remove_product_page('+AucId+', \''+img_empty+'\')" class="delete-compare field-link" data-tooltip="Hapus Item Bandingkan"><i class="fa fa-times"></i></a>'+
                     '</div>'+
                     '<h2>'+Merk+' '+Seri+' '+Silinder+' '+Tipe+' '+Model+' '+Transmisi+'</h2>'+
                     '<span>'+getLocalStorage[i].Tahun+'</span> <span class="price">Rp. '+currency_format(getLocalStorage[i].Price)+'</span>'+
                     '</a>'+
                     '<h3 class="header-compare">Nomor Polisi <span>'+getLocalStorage[i].NoPolisi+'</span></h3>'+
                     '<table class="table table-list-compare">'+
                     '<tr><td>Model Kendaraan</td><td>'+getLocalStorage[i].Model+'</td></tr>'+
                     '<tr><td>KEUR</td><td>-</td></tr>'+
                     '<tr><td>Kilometer</td><td>'+getLocalStorage[i].Kilometer+'</td></tr>'+
                     '</table>'+
                     '<table class="table table-list-compare">'+
                     '<tr><td>Nomor Rangka</td><td>'+getLocalStorage[i].NoRangka+'</td></tr>'+
                     '<tr><td>Nomor Mesin</td><td>'+getLocalStorage[i].NoMesin+'</td></tr>'+
                     '<tr><td>Tipe</td><td>'+getLocalStorage[i].Seri+'</td></tr>'+
                     '<tr><td>Transmisi</td><td>'+getLocalStorage[i].Transmisi+'</td></tr>'+
                     '<tr><td>Warna Fisik</td><td>'+Warna+'</td></tr>'+
                     '<tr><td>STNK</td><td>'+Stnk+'</td></tr>'+
                     '</table>'+
                     '<div class="button-compare"><button class="btn btn-violet">Tawar</button></div>'+
                     '</div>'+
                     '</div>';
         }
      }
      else {
         content = '<div class="text-align-center width-unset">'+
                     '<div>'+
                     '<img src="'+img_empty+'" alt="" title="">'+
                     '</div>'+
                     '<p>Oops.... <span>Data Perbandingan Tidak Ada.</span></p>'+
                     '</div>';
      }
   }
   $('#loadContent').html(content);
}

function check_exists(obj1, obj2) {
   var exists = false;
   for(var i = 0; i < obj2.length; i++) {
      if(obj1.AuctionItemId === obj2[i].AuctionItemId) {
         exists = true;
      }
   }
   return exists;
}

function set_compare_product(object, linked) {
   var getStorage = localStorage.getItem("CP");
   if(getStorage === null) {
      localStorage.setItem("CP", JSON.stringify([object]));
      document.getElementById('addcompare').style.display = 'block';
      //check_exists(object, JSON.parse(getStorage));
      setCompare(linked);
   }
   else if(check_exists(object, JSON.parse(getStorage)) === true) {
      alert_bootoast('Objek sudah ditambahkan di Perbandingkan Produk, Silahkan pilih objek yang lain');
   }
   else {
      if(getStorage === null) {
         localStorage.setItem("CP", JSON.stringify([object]));
         document.getElementById('addcompare').style.display = 'block';
      }
      else if(JSON.parse(localStorage.getItem("CP")).length >= 1 && JSON.parse(localStorage.getItem("CP")).length < 4) {
         var rep = appendObjTo(JSON.parse(localStorage.getItem("CP")), object);
         localStorage.setItem("CP", JSON.stringify(rep));
      }
      setCompare(linked);
   }
}

// function for add object into array
function appendObjTo(thatArray, objToAppend) {
  return Object.freeze(thatArray.concat(objToAppend));
}

// function for delete compare product (https://stackoverflow.com/a/10024926)
function remove_product(id, linked) {
   var getLocalStorage = JSON.parse(localStorage.getItem('CP'));
   var removeId = getLocalStorage.filter(function(el) {
      return el.AuctionItemId !== id;
   });
   localStorage.setItem("CP", JSON.stringify(removeId));
   if(getLocalStorage.length === 1) {
      localStorage.removeItem("CP");
      $('a.close-compare').trigger('click');
      setTimeout(function() {
         $('#addcompare').css('display', 'none');
      }, 100);
   }
   setCompare(linked);
}

function remove_product_page(id, img_empty) {
   var getLocalStorage = JSON.parse(localStorage.getItem('CP'));
   var removeId = getLocalStorage.filter(function(el) {
      return el.AuctionItemId !== id;
   });
   localStorage.setItem("CP", JSON.stringify(removeId));
   if(getLocalStorage.length === 1) {
      localStorage.removeItem("CP");
      var html = '<div class="text-align-center width-unset">'+
                  '<div>'+
                  '<img src="'+img_empty+'" alt="" title="">'+
                  '</div>'+
                  '<p>Oops.... <span>Data Belum Tersedia.</span></p>'+
                  '</div>';
      $('#loadContent').html(html);
   }
   else {
      location.reload();
   }
}

function currency_format(n) {
   if(n !== null) {
      return n.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
   }
   else {
      return 0;
   }
}