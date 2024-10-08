<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>

<div class="container-sm bg-glass mt-5 border-2 shadow-sm p-4 mb-4 rounded" data-aos="fade-down">
    <center>
        <h1 class="text-white">&nbsp;<i class="fa-duotone fa-browser"></i>&nbsp;จัดการเว็บไซต์</h1>
    </center>
    <hr>
    <div class="col-lg-6 m-auto">
        <div class="mb-2 mt-4">
            <p class="m-0 text-white ">ชื่อเว็บไซต์ <span class="text-danger">*</span></p>
            <input type="text" id="site_name" class="form-control" value="<?php echo $config['name']; ?>">
        </div>
        <div class="mb-2 ">
            <p class="m-0 text-white ">ภาพ Logo (ลิงค์) <span class="text-danger">*</span></p>
            <input type="text" id="site_logo" class="form-control" value="<?php echo $config['logo']; ?>">
        </div>

        <div class="mb-2 ">
            <p class="m-0 text-white ">ภาพ Background (ลิงค์) <span class="text-danger">*</span></p>
            <input type="text" id="site_bg" class="form-control" value="<?php echo $config['bg2']; ?>">
        </div>

        <div class="mb-2 ">
            <p class="m-0 text-white ">ภาพ Widget Discord (ลิงค์) <span class="text-danger">*</span></p>
            <input type="text" id="site_bg" class="form-control" value="<?php echo $config['bg3']; ?>">
        </div>

        <div class="mb-2">
            <p class="m-0 text-white ">ประกาศ <span class="text-danger">*</span></p>
            <input type="text" id="ann" class="form-control" value="<?php echo $config['ann']; ?>">
        </div>

        <div class="mb-2 ">
            <p class="m-0 text-white ">คำอธิบายร้านค้า <span class="text-danger">*รวมถึงEmbed</span></p>
            <textarea id="site_des" class="form-control"><?php echo $config['des']; ?></textarea>
        </div>

        <div class="row justify-content-between">
            <div class="mb-5 col">
                <div class="text-center">
                    <p class="m-0 text-white">สีหลักของเว็บไซต์ <span class="text-danger">*</span></p>
                    <input type="color" class="form-control form-control-color w-100" id="site_main_color" value="<?php echo $config['main_color']; ?>">
                </div>
            </div>
            <div class="mb-5 col">
                <div class="text-center">
                    <p class="m-0 text-white">สีรองของเว็บไซต์ <span class="text-danger">*</span></p>
                    <input type="color" class="form-control form-control-color w-100" id="site_sec_color" value="<?php echo $config['sec_color']; ?>">
                </div>
            </div>
        </div>

        <div class="mb-2">
            <p class="m-0 text-white ">Widget Discord (ไอดี) <span class="text-danger">*</span></p>
            <input type="text" id="site_widget_discord" class="form-control" value="<?php echo $config['widget_discord']; ?>">
        </div>

        <div class="mb-2 ">
            <p class="m-0 text-white ">Webhook Discord (ลิงค์) <span class="text-danger">*สำหรับแจ้งเตือน ซื้อของ/เติมเงิน</span></p>
            <input type="text" id="webhook_dc" class="form-control" value="<?php echo $config['webhook_dc']; ?>">
        </div>

        <div class="mb-2">
            <p class="m-0 text-white ">ช่องทางการติดต่อ Discord (ลิงค์) <span class="text-danger">*</span></p>
            <input type="text" id="site_contact_discord" class="form-control" value="<?php echo $config['discord']; ?>">
        </div>
        <div class="mb-2">
            <p class="m-0 text-white ">ช่องทางการติดต่อ Facebook (ลิงค์) <span class="text-danger">*</span></p>
            <input type="text" id="site_contact_facebook" class="form-control" value="<?php echo $config['facebook']; ?>">
        </div>
        <div class="mb-2">
            <button class="btn text-white bg-main w-100" id="btn_regis">บันทึกข้อมูล</button>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#insert_btn").click(function() {
        var formData = new FormData();
        formData.append('s_count', $("#s_count").val());
        formData.append('m_count', $("#m_count").val());
        formData.append('b_count', $("#b_count").val());
        $.ajax({
            type: 'POST',
            url: 'system/backend/static_udpate.php',
            data: formData,
            contentType: false,
            processData: false,
        }).done(function(res) {
            result = res;
            Swal.fire({
                icon: 'success',
                title: 'สำเร็จ',
                text: result.message
            }).then(function() {
                window.location = "?page=<?php echo $_GET['page']; ?>";
            });
        }).fail(function(jqXHR) {
            console.log(jqXHR);
            res = jqXHR.responseJSON;
            Swal.fire({
                icon: 'error',
                title: 'เกิดข้อผิดพลาด',
                text: res.message
            })
            //console.clear();
        });
        // $("#save_btn").attr("data-id") <- id user
    });
    $("#open_insert").click(function() {
        const myModal = new bootstrap.Modal('#product_insert', {
            keyboard: false
        })
        myModal.show();
    });
    $("#btn_regis").click(function(e) {
        e.preventDefault();
        var check;
        // if ($('#pc').is(':checked')) {
        //     check = "on";
        // } else {
        //     check = "off";
        // }
        var formData = new FormData();
        formData.append('name', $("#site_name").val());
        formData.append('widget_discord', $("#site_widget_discord").val());
        formData.append('main_color', $("#site_main_color").val());
        formData.append('logo', $("#site_logo").val());
        formData.append('sec_color', $("#site_sec_color").val());
        formData.append('widget_discord'  , $("#site_widget_discord").val() );
        formData.append('discord', $("#site_contact_discord").val());
        formData.append('facebook', $("#site_contact_facebook").val());
        formData.append('des', $("#site_des").val());
        formData.append('ann', $("#ann").val());
        formData.append('webhook_dc', $("#webhook_dc").val());
        formData.append('bg2', $("#site_bg").val());
        formData.append('bg3', $("#site_bg3").val());
        $('#btn_regis').attr('disabled', 'disabled');
        $.ajax({
            type: 'POST',
            url: 'system/backend/website.php',
            data: formData,
            contentType: false,
            processData: false,
        }).done(function(res) {
            result = res;
            console.log(result);
            Swal.fire({
                icon: 'success',
                title: 'สำเร็จ',
                text: result.message
            }).then(function() {
                window.location = "?page=<?php echo $_GET['page']; ?>";
            });
        }).fail(function(jqXHR) {
            console.log(jqXHR);
            res = jqXHR.responseJSON;
            Swal.fire({
                icon: 'error',
                title: 'เกิดข้อผิดพลาด',
                text: res.message
            })
            //console.clear();
            $('#btn_regis').removeAttr('disabled');
        });
    });
</script>