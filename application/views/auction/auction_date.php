<section class="section section-auction">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h2>Jadwal Lelang <span class="info-schedule"><i>i</i> Klik Kode Kota untuk Detail Lelang</span></h2>
            <div class="filter-schedule">
               <form id="thisFormCalendar" class="form-inline">
                  <div class="form-group">
                     <label>Kota</label>
                     <select id="thisCabang" class="select-custom form-control">
                        <option value="" >Semua Jadwal</option>
						<?php foreach($cabang as $row){ $arrKota[$row['CompanyId']] = $row['AliasName']; ?>
						<option value="<?php echo $row['CompanyId']; ?>" ><?php echo substr($row['CompanyName'],4); ?></option>
						<?php } ?>
                     </select>
                  </div>
                  <div class="form-group">
                     <label>Jenis Barang </label>
                     <div class=" select-auctCategory">
                        <label class="car-type ">
                           <div class="ic ic-Mobil">
                           </div>
                           <input type="checkbox" class="checkbox-custom cursor-pointer" name="cbCar" id="cbCar" value="1" />
                           <span>Mobil</span>
                        </label>
                        <label class="motorcycle-type">
                           <div class=" ic ic-Motor">
                           </div>
                           <input type="checkbox" class="checkbox-custom cursor-pointer" name="cbMtr" id="cbMtr" value="1" />
                           <span>Motor</span>
                        </label>
                        <label class="hve-type">
                           <div class=" ic ic-HVE">
                           </div>
                           <input type="checkbox" class="checkbox-custom cursor-pointer" name="cbHve" id="cbHve" value="1" />
                           <span>HVE</span>
                        </label>
                        <label class="gadget-type">
                           <div class=" ic ic-Gadget">
                           </div>
                           <input type="checkbox" class="checkbox-custom cursor-pointer" name="cbGad" id="cbGad" value="1" />
                           <span>Gadget</span>
                        </label>
                     </div>
                  </div>
                  <button type="button" id="btnCariJadwal" class="btn btn-green">Cari</button>
               </form>
            </div>
            <div id="calendar" class="action-schedule"></div>
         </div>
      </div>
   </div>
</section>

<div class="modal fade" id="modal-jadwal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title" id="myModalLabel">14 <span>Rabu</span></h4>
         </div>
         <div class="modal-body" align="center">
            <ul class="clearfix" id="thisObjTglLelang">
               <!-- Memuat Data -->
            </ul>
         </div>
      </div>
   </div>
</div>
<script>
var arrHari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
var arrKota = <?php echo json_encode($arrKota); ?>;

function getDates(startDate, endDate) {
   var now = startDate,
   dates = [];

   while (now.format('YYYY-MM-DD') <= endDate.format('YYYY-MM-DD')) {
      dates.push(now.format('YYYY-MM-DD'));
      now.add('days', 1);
      now.add('days', 1);
   }
   return dates;
}

function getCalendar() {
   window.countCell = true;
	$('#calendar').fullCalendar({
      header: {
         left: 'prev,next today',
         center: 'title',
         right: 'month,agendaWeek,agendaDay,listMonth'
      },
      monthNames:['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
      height:'auto',
      defaultDate: '<?php echo date('Y-m-d'); ?>', //'2017-11-12',
      // defaultDate: '2017-11-12',
      navLinks: true, // can click day/week names to navigate views
      businessHours: true, // display business hours
      editable: false,
      // events: even_cal,
      dayRender: function(date, cell) {
         if(countCell === true) {
            countCell = false;
            //$('#calendar').append('<div class="loading-schedule"><i class="fa fa-lg fa-spin fa-refresh" style="margin:0 auto;"></i></div>');
            $('.fc-day').append('<div class="loading-schedule"><i class="fa fa-lg fa-spin fa-refresh" style="margin:0 auto;"></i></div>');
         }
         thisCabang = $('#thisCabang').val();
         var parseDate = moment(cell.attr("data-date")).format('e');
         var thisHari = arrHari[parseDate];
         $("td.fc-day-top[data-date='"+cell.attr("data-date")+"']").append("<span>"+thisHari+"</span>");
         $("td.fc-day-top[data-date='"+cell.attr("data-date")+"']").append("<a class='link cursor-pointer' data-toggle='modal' data-target='#modal-jadwal' thisDate='"+cell.attr("data-date")+"' onclick='cobaSini(\""+thisCabang+"\", \""+cell.attr("data-date")+"\", \""+thisHari+"\")'>Selengkapnya</a>");
         $("td.fc-day.fc-widget-content[data-date='"+cell.attr("data-date")+"']").append("<a class='link cursor-pointer' data-toggle='modal' data-target='#modal-jadwal' thisDate='"+cell.attr("data-date")+"' onclick='cobaSini(\""+thisCabang+"\", \""+cell.attr("data-date")+"\", \""+thisHari+"\")'>Selengkapnya</a>");
      },
      eventRender: function(event, element) {
         $('.fc-day > div.loading-schedule').remove();
         element.attr('title', event.tip);
         var dataToFind = moment(event.start).format('YYYY-MM-DD');
         $("td[data-date='" + dataToFind + "']").append(element);
      },
      eventAfterAllRender: function(view) {
         $("td.fc-event-container").find("a").remove()
      },
      events: function(start, end, timezone, callback) {
         $.ajax({
            // url: '<?php echo linkservice('FRONTEND') ."auction/Get_schedule"; ?>',
            url: '<?php echo site_url("auction/Get_schedule"); ?>',
            dataType: 'json',
            data: {
            start: start.unix(),
            end: end.unix(),
            thisCabang: $('#thisCabang').val(),
            cbCar: $('#cbCar:checked').val(),
            cbMtr: $('#cbMtr:checked').val(),
            cbHve: $('#cbHve:checked').val(),
            cbGad: $('#cbGad:checked').val(),
         },
         success: function(doc) {
            var events = [];
            for(var i=0; i<doc.length; i++) {
               events.push({
                  title: doc[i].title,
                  start: doc[i].start,
                  end: doc[i].end,
                  allDay: false,
                  className: doc[i].className,
               });
            }
            callback(events);
         },
         beforeSend: function() {
            // console.log();
         },
         complete: function() {
            // console.log('masuk sana');
         },
        });
      }
   });

}


$(document).ready(function() {
   var even_cal = [{ 
      title: 'JKT T',
      start: '2017-11-10',
      end: '2017-11-10',
      allDay: false,
      className: 'car-event',
      tip: 'Personal tip 1'
   }, { 
      title: 'JKT T',
      start: '2017-11-10',
      end: '2017-11-10',
      allDay: false,
      className: 'car-event',
   }, { 
      title: 'JKT T',
      start: '2017-11-10',
      end: '2017-11-10',
      allDay: false,
      className: 'car-event',
   }, { 
      title: 'JKT T',
      start: '2017-11-10',
      end: '2017-11-10',
      allDay: false,
      className: 'car-event',
   }, {
      title: 'JKT S',
      start: '2017-11-10',
      end: '2017-11-10',
      allDay: false,
      className: 'motor-event',
   }, {
      title: 'JKT S',
      start: '2017-11-10',
      end: '2017-11-10',
      allDay: false,
      className: 'motor-event',
   }, {
      title: 'JKT S',
      start: '2017-11-10',
      end: '2017-11-10',
      allDay: false,
      className: 'motor-event',
   }, {
      title: 'JKT S',
      start: '2017-11-10',
      end: '2017-11-10',
      allDay: false,
      className: 'motor-event',
   }, {
      title: 'JKT S',
      start: '2017-11-10',
      end: '2017-11-10',
      allDay: false,
      className: 'hve-event',
   }, { 
      title: 'JKT T',
      start:'2017-11-03',
      end: '2017-11-03',
      allDay: false,
      className: 'car-event',
   }, { 
      title: 'JKT T',
      start: '2017-11-03',
      end: '2017-11-03',
      allDay: false,
      className: 'car-event',
   }, { 
      title: 'JKT T',
      start: '2017-11-03',
      end: '2017-11-03',
      allDay: false,
      className: 'car-event',
   }, { 
      title: 'JKT T',
      start: '2017-11-03',
      end: '2017-11-03',
      allDay: false,
      className: 'car-event',
   }, {
      title: 'JKT S',
      start: '2017-11-03',
      end: '2017-11-03',
      allDay: false,
      className: 'motor-event',
   }, {
      title: 'JKT S',
      start: '2017-11-03',
      end: '2017-11-10',
      allDay: false,
      className: 'motor-event',
   },{
      title: 'JKT S',
      start:'2017-11-03',
      end: '2017-11-03',
      allDay: false,
      className: 'motor-event',
   }, {
      title: 'JKT S',
      start: '2017-11-03',
      end: '2017-11-03',
      allDay: false,
      className: 'hve-event',
   }, {
      title: 'JKT T',
      start: '2017-11-24',
      end: '2017-11-24',
      allDay: false,
      className: 'gadget-event',
   }, {
      title: 'JKT T',
      start: '2017-11-24',
      end: '2017-11-24',
      allDay: false,
      className: 'gadget-event',
   }, {
      title: 'JKT T',
      start: '2017-11-24',
      end: '2017-11-24',
      allDay: false,
      className: 'gadget-event',
   }];
   
   
   $("nav").sticky({
      topSpacing: 0
   });

   $(".select-custom").select2({
      minimumResultsForSearch: -1
   });
   
   $('.thisDate').click(function() {
	   thisDate = $(this).attr('thisDate');
	   $('#myModalLabel').html(thisDate+' sanusi masuk sini');
	   // return false;
   });
   
   $('#btnCariJadwal').click(function(){
	   $('#calendar').fullCalendar('destroy');
	   getCalendar();
	   // alert('masuk');
	   // $('#calendar').fullCalendar('removeEvents',event._id);
	   // $('#calendar').fullCalendar( 'renderEvent' );
	   // getCalendar();
   });
   
   getCalendar();
});

function cobaSini(thisCabang, thisDate, thisHari){
	// thisDate = $(this).attr('thisDate');
   $('#myModalLabel').html(thisDate+' <span>'+thisHari+' '+thisCabang+'</span>');
   
   $.ajax({
		url: '<?php echo linkservice('AMSSCHEDULE').'schedulelist'; ?>',
		dataType: 'json',
		data: {
			startdate: thisDate,
			enddate: thisDate,
			company_id: thisCabang
		},
		beforeSend: function(){
			$('#thisObjTglLelang').html('<li style="padding:10px; width:100%"><b class="text-shadows">Sedang Memuat Data...</b></li>');
		},
		success: function(doc) {
			thisHtmlAppend = '';
			if (doc.data.length > 0){
				for(var i=0; i<doc.data.length; i++){
					thisData = doc.data[i];
					if (thisData.ItemName == 'MOBIL')
						thisHtmlAppend += '<li><a href="<?php echo site_url('cari-lelang'); ?>?tipe-object=6" class="car-event"> <span>'+arrKota[thisData.company_id]+'</span></a></li>';
					else if (thisData.ItemName == 'MOTOR')
						thisHtmlAppend += '<li><a href="<?php echo site_url('cari-lelang'); ?>?tipe-object=7" class="motor-event"> <span>'+arrKota[thisData.company_id]+'</span></a></li>';
					else if (thisData.ItemName == 'HVE')
						thisHtmlAppend += '<li><a href="<?php echo site_url('cari-lelang'); ?>?tipe-object=14" class="hve-event"> <span>'+arrKota[thisData.company_id]+'</span></a></li>';
					else if (thisData.ItemName == 'GADGET')
						thisHtmlAppend += '<li><a href="<?php echo site_url('cari-lelang'); ?>?tipe-object=12" class="gadget-event"> <span>'+arrKota[thisData.company_id]+'</span></a></li>';
				}
			}
         else {
            thisHtmlAppend = '<div style="padding:10px; width:100%"><b class="text-shadows">Data Tidak Ada</b></div>';
         }
			$('#thisObjTglLelang').html(thisHtmlAppend);
		},
		complete: function(){
			// console.log('masuk sana');
		},
	});
   
}

</script>