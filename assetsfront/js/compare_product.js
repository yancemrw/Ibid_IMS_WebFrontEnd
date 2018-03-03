function setCompare(linked) {
   var content = '', getLocalStorage = JSON.parse(localStorage.getItem('CP'));
   if(getLocalStorage !== null) {
      for(var i = 0; i < getLocalStorage.length; i++) {
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
                     '<button class="btn btn-red">Hapus</button>'+
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

function setComparePage() {
   var getLocalStorage = JSON.parse(localStorage.getItem('CP')), content = '';
   for(var i = 0; i < getLocalStorage.length; i++) {
      var Merk = getLocalStorage[i].Merk;
      var Seri = getLocalStorage[i].Seri;
      var Silinder = getLocalStorage[i].Silinder;
      var Tipe = getLocalStorage[i].Tipe;
      var Model = getLocalStorage[i].Model;
      var Transmisi = getLocalStorage[i].Transmisi;
      content += '<div class="col-md-3 item width-100">'+
               '<div class="list-product box-recommend list-compare">'+
               '<a href="javascript:void(0);">'+
               '<div class="thumbnail">'+
               '<div class="background-cover height-200px thumnail-custom" style="background: url('+getLocalStorage[i].Image+') no-repeat center center"></div>'+
               '<div class="overlay-grade">Grade <span>'+getLocalStorage[i].TaksasiGrade+'</span></div>'+
               '<p class="overlay-lot">LOT ???</p>'+
               '<a href="#" class="delete-compare field-link" data-tooltip="Hapus Item Bandingkan"><i class="fa fa-times"></i></a>'+
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
               '<tr><td>Warna Fisik</td><td>'+getLocalStorage[i].Warna+'</td></tr>'+
               '<tr><td>STNK</td><td>'+getLocalStorage[i].NoSTNK+'</td></tr>'+
               '</table>'+
               '<div class="button-compare"><button class="btn btn-violet">Tawar</button></div>'+
               '</div>'+
               '</div>';
   }
   $('#loadContent').replaceWith(content);
}

function set_compare_product(object, linked) {
   if(localStorage.getItem("CP") === null) {
      localStorage.setItem("CP", JSON.stringify([object]));
      document.getElementById('addcompare').style.display = 'block';
   }
   else if(JSON.parse(localStorage.getItem("CP")).length >= 1 && JSON.parse(localStorage.getItem("CP")).length < 4) {
      var rep = appendObjTo(JSON.parse(localStorage.getItem("CP")), object);
      localStorage.setItem("CP", JSON.stringify(rep));
   }
   setCompare(linked);
}

// function for add object into array
function appendObjTo(thatArray, objToAppend) {
  return Object.freeze(thatArray.concat(objToAppend));
}

function currency_format(n) {
   return n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');
}