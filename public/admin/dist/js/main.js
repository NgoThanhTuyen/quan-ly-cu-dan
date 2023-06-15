var config = {};

var init_function = {
    init: function () {
        let _this = this;
        _this.bs_input_file();
        _this.showImage();
        _this.preview();
    },
    bs_input_file: function () {
        $(".input-file").before(
            function() {
                if ( ! $(this).prev().hasClass('input-ghost') ) {
                    var element = $("<input type='file' class='input-ghost' id='input_img' style='visibility:hidden; height:0'>");
                    element.attr("name",$(this).attr("name"));
                    element.change(function(){
                        element.next(element).find('input').val((element.val()).split('\\').pop());
                    });
                    $(this).find("button.btn-choose").click(function(){
                        element.click();
                    });
                    $(this).find("button.btn-reset").click(function(){
                        element.val(null);
                        $(this).parents(".input-file").find('input').val('');
                    });
                    $(this).find('input').css("cursor","pointer");
                    $(this).find('input').mousedown(function() {
                        $(this).parents('.input-file').prev().click();
                        return false;
                    });
                    return element;
                }
            }
        );
    },
    showImage: function() {
        $("#input_img").change(function() {
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#image_render').attr('src', e.target.result);
                    $('#image_render').css('height', '150px');
                    $('#image_render').css('display', 'block');
                }

                reader.readAsDataURL(this.files[0]);
            }
        });
    },
    preview : function () {
        $(".btn-preview").click(function (event) {
            event.preventDefault();
            let url = $(this).attr('href');
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
            }).done(function (result) {
                if (result.html)
                {
                    $("#preview").html('').append(result.html);
                    $(".preview").modal('show');
                }
            })
        })
    }
}

$(function () {
    init_function.init();
    $('.btn-confirm-delete').confirm({
        title: 'Xóa dữ liệu',
        content: "Bạn có chăc chắn muốn xóa dữ liệu ?",
        icon: 'fa fa-warning',
        type: 'red',
        buttons: {
            confirm: {
                text: 'Xác nhận',
                btnClass: 'btn-blue',
                action: function () {
                    location.href = this.$target.attr('href');
                }
            },
            cancel: {
                text: 'Hủy',
                btnClass: 'btn-danger',
                action: function () {
                }
            }
        }
    });
    $('.select-user').change(function () {
        var user_id = $(this).val();
        var url = $(this).attr('url');
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            async: true,
            data: {
                id: user_id
            }
        }).done(function (result) {
            if (result.status_code == 200) {
                $('.blood_group').val(result.blood_group);
            }
        }).fail(function (XMLHttpRequest, textStatus, thrownError) {
            console.log(thrownError)
        });
    })
    $("#check-all").click(function () {
        $('input.check_auto_clearing:checkbox').prop('checked', $(this).is(':checked'));
    });

    $('.update-user-register').click(function () {

        var url = $(this).attr('url')
        var event_id = $(this).attr('event_id')
        var status = $('.status').val();
        var note  = $('.note').val();
        var ids = new Array();
        $('[name="id[]"]:checked').each(function()
        {
            ids.push($(this).val());
        });
        if (ids.length == 0) {
            $.confirm({
                title: 'Thông báo',
                content: 'Bạn cần chọn thành viên muốn cập nhật',
                buttons: {
                    ok: {
                        text: "OK",
                        btnClass: 'btn-primary',
                        keys: ['enter'],
                        action: function(){
                        }
                    }
                }
            });
            return false;
        }

        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            async: true,
            data: {
                status: status,
                note: note,
                ids: ids,
                event_id: event_id,
            }
        }).done(function (result) {
            if (result.status_code == 200) {
                toastr.success('Cập nhật thành công', {timeOut: 3000});
                setTimeout(function () {
                    $url = window.location.href;
                    window.location.href = $url;
                }, 1000)
            } else {
                toastr.error('Cập nhật thất bại', {timeOut: 3000});
                setTimeout(function () {
                    $url = window.location.href;
                    window.location.href = $url;
                }, 1000)
            }
        }).fail(function (XMLHttpRequest, textStatus, thrownError) {
            console.log(thrownError)
        });
    })

    $('.btn-add-working-process').click(function () {

        var html = `<tr>
                        <td style="vertical-align: middle;"><input type="date" class="form-control" name="start_working_process[]"></td>
                        <td style="vertical-align: middle;"><input type="date" class="form-control" name="end_working_process[]"></td>
                        <td style="vertical-align: middle;">
                            <input type="text" class="form-control" name="chuc_vu_don_vi[]">
                        </td>
                        <td style="vertical-align: middle;"><input type="text" class="form-control" name="chuc_vu_dang[]"></td>
                        <td style="vertical-align: middle;">
                            <a class="btn btn-danger btn-sm btn-delete-working-process" href="">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>`;
        $('#working-process').append(html)
    })

    $(document).on('click', '.btn-delete-working-process', function (event) {
        event.preventDefault();
        var totalRowCount = $("#table-working-process tr").length;

        var _that = $(this);
        if ( totalRowCount > 3 ) {
            $.confirm({
                title: 'Cảnh báo?',
                content: 'Bạn có chắc chắn muốn thực hiện thao tác này không.',
                type: 'green',
                buttons: {
                    ok: {
                        text: "ok!",
                        btnClass: 'btn-primary',
                        keys: ['enter'],
                        action: function(){
                            _that.parent().parent().remove();
                        }
                    },
                    cancel: {
                        btnClass: 'btn-danger',
                    },
                }
            });
        } else {
            $.confirm({
                title: 'Thông báo',
                content: 'Dữ liệu không thể xóa vui lòng thử lại',
                type: 'green',
                buttons: {
                    ok: {
                        text: "ok!",
                        btnClass: 'btn-primary',
                        keys: ['enter'],
                        action: function(){
                        }
                    },
                }
            });
        }
    });

    $('.btn-add-ranks').click(function () {
        var html = `<tr>
                        <td style="vertical-align: middle;"><input type="date" class="form-control" name="thoi_gian[]"></td>
                        <td style="vertical-align: middle;">
                            <input type="text" class="form-control" name="cap_bac_he_so[]">
                        </td>
                        <td style="vertical-align: middle;"><input type="text" class="form-control" name="so_quyet_dinh[]"></td>
                        <td style="vertical-align: middle;"><input type="text" class="form-control" name="chu_ky[]"></td>
                        <td style="vertical-align: middle;">
                            <a class="btn btn-danger btn-sm btn-delete-ranks" href="">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>`;
        $('#ranks').append(html)
    })

    $(document).on('click', '.btn-delete-ranks', function (event) {
        event.preventDefault();
        var totalRowCount = $("#table-ranks tr").length;
        var _that = $(this);
        if ( totalRowCount > 2 ) {
            $.confirm({
                title: 'Cảnh báo?',
                content: 'Bạn có chắc chắn muốn thực hiện thao tác này không.',
                type: 'green',
                buttons: {
                    ok: {
                        text: "ok!",
                        btnClass: 'btn-primary',
                        keys: ['enter'],
                        action: function(){
                            _that.parent().parent().remove();
                        }
                    },
                    cancel: {
                        btnClass: 'btn-danger',
                    },
                }
            });
        } else {
            $.confirm({
                title: 'Thông báo',
                content: 'Dữ liệu không thể xóa vui lòng thử lại',
                type: 'green',
                buttons: {
                    ok: {
                        text: "ok!",
                        btnClass: 'btn-primary',
                        keys: ['enter'],
                        action: function(){
                        }
                    },
                }
            });
        }
    });

    $('.btn-add-learning-process').click(function () {
        var html = `<tr location="0" class="learning-process-0">
                        <td style="vertical-align: middle;"><input type="date" class="form-control" name="ngay_bat_dau[]"></td>
                        <td style="vertical-align: middle;"><input type="date" class="form-control" name="ngay_ket_thuc[]"></td>
                        <td style="vertical-align: middle;">
                            <input type="text" class="form-control" name="ten_truong[]">
                        </td>
                        <td style="vertical-align: middle;"><input type="text" class="form-control" name="hinh_thuc_dao_tao[]"></td>
                        <td style="vertical-align: middle;"><input type="text" class="form-control" name="phan_loai[]"></td>
                        <td style="vertical-align: middle;">
                            <a class="btn btn-danger btn-sm btn-delete-learning-process" href="">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>`;
        $('#learning-process').append(html)
    })

    $(document).on('click', '.btn-delete-learning-process', function (event) {
        event.preventDefault();
        var totalRowCount = $("#table-learning-process tr").length;
        var _that = $(this);
        if ( totalRowCount > 2 ) {
            $.confirm({
                title: 'Cảnh báo?',
                content: 'Bạn có chắc chắn muốn thực hiện thao tác này không.',
                type: 'green',
                buttons: {
                    ok: {
                        text: "ok!",
                        btnClass: 'btn-primary',
                        keys: ['enter'],
                        action: function(){
                            _that.parent().parent().remove();
                        }
                    },
                    cancel: {
                        btnClass: 'btn-danger',
                    },
                }
            });
        } else {
            $.confirm({
                title: 'Thông báo',
                content: 'Dữ liệu không thể xóa vui lòng thử lại',
                type: 'green',
                buttons: {
                    ok: {
                        text: "ok!",
                        btnClass: 'btn-primary',
                        keys: ['enter'],
                        action: function(){
                        }
                    },
                }
            });
        }
    });

    $('.btn-add-join-wars').click(function () {
        var html = `<tr location="0" class="join-wars-0">
                        <td style="vertical-align: middle;"><input type="date" class="form-control" name="join_wars_time[]"></td>
                        <td style="vertical-align: middle;">
                            <input type="text" class="form-control" name="ten_chien_dich[]">
                        </td>
                        <td style="vertical-align: middle;"><input type="text" class="form-control" name="chien_truong[]"></td>
                        <td style="vertical-align: middle;"><input type="text" class="form-control" name="don_vi_cuong_vi[]"></td>
                        <td style="vertical-align: middle;"><input type="text" class="form-control" name="doi_tuong_tac_chien[]"></td>
                        <td style="vertical-align: middle;">
                            <a class="btn btn-danger btn-sm btn-delete-join-wars" href="">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>`;
        $('#join-wars').append(html)
    })

    $(document).on('click', '.btn-delete-join-wars', function (event) {
        event.preventDefault();
        var totalRowCount = $("#table-join-wars tr").length;
        var _that = $(this);
        if ( totalRowCount > 2 ) {
            $.confirm({
                title: 'Cảnh báo?',
                content: 'Bạn có chắc chắn muốn thực hiện thao tác này không.',
                type: 'green',
                buttons: {
                    ok: {
                        text: "ok!",
                        btnClass: 'btn-primary',
                        keys: ['enter'],
                        action: function(){
                            _that.parent().parent().remove();
                        }
                    },
                    cancel: {
                        btnClass: 'btn-danger',
                    },
                }
            });
        } else {
            $.confirm({
                title: 'Thông báo',
                content: 'Dữ liệu không thể xóa vui lòng thử lại',
                type: 'green',
                buttons: {
                    ok: {
                        text: "ok!",
                        btnClass: 'btn-primary',
                        keys: ['enter'],
                        action: function(){
                        }
                    },
                }
            });
        }
    });

    $('.btn-add-rewards').click(function () {
        var html = `<tr location="0" class="join-wars-0">
                        <td style="vertical-align: middle;"><input type="date" class="form-control" name="reward_time[]"></td>
                        <td style="vertical-align: middle;">
                            <input type="text" class="form-control" name="hinh_thuc[]">
                        </td>
                        <td style="vertical-align: middle;"><input type="text" class="form-control" name="ly_do[]"></td>
                        <td style="vertical-align: middle;"><input type="text" class="form-control" name="cap_quyet_dinh[]"></td>
                        <td style="vertical-align: middle;">
                            <a class="btn btn-danger btn-sm btn-delete-rewards" href="">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>`;
        $('#rewards').append(html)
    })

    $(document).on('click', '.btn-delete-rewards', function (event) {
        event.preventDefault();
        var totalRowCount = $("#table-rewards tr").length;
        var _that = $(this);
        if ( totalRowCount > 2 ) {
            $.confirm({
                title: 'Cảnh báo?',
                content: 'Bạn có chắc chắn muốn thực hiện thao tác này không.',
                type: 'green',
                buttons: {
                    ok: {
                        text: "ok!",
                        btnClass: 'btn-primary',
                        keys: ['enter'],
                        action: function(){
                            _that.parent().parent().remove();
                        }
                    },
                    cancel: {
                        btnClass: 'btn-danger',
                    },
                }
            });
        } else {
            $.confirm({
                title: 'Thông báo',
                content: 'Dữ liệu không thể xóa vui lòng thử lại',
                type: 'green',
                buttons: {
                    ok: {
                        text: "ok!",
                        btnClass: 'btn-primary',
                        keys: ['enter'],
                        action: function(){
                        }
                    },
                }
            });
        }
    });

    $('.btn-add-disciplines').click(function () {
        var html = `<tr location="0" class="disciplines-0">
                        <td style="vertical-align: middle;"><input type="date" class="form-control" name="discipline_time[]"></td>
                        <td style="vertical-align: middle;">
                            <input type="text" class="form-control" name="discipline_hinh_thuc[]">
                        </td>
                        <td style="vertical-align: middle;"><input type="text" class="form-control" name="discipline_ly_do[]"></td>
                        <td style="vertical-align: middle;"><input type="text" class="form-control" name="discipline_cap_quyet_dinh[]"></td>
                        <td style="vertical-align: middle;">
                            <a class="btn btn-danger btn-sm btn-delete-disciplines" href="">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>`;
        $('#disciplines').append(html)
    })

    $(document).on('click', '.btn-delete-disciplines', function (event) {
        event.preventDefault();
        var totalRowCount = $("#table-disciplines tr").length;
        var _that = $(this);
        if ( totalRowCount > 2 ) {
            $.confirm({
                title: 'Cảnh báo?',
                content: 'Bạn có chắc chắn muốn thực hiện thao tác này không.',
                type: 'green',
                buttons: {
                    ok: {
                        text: "ok!",
                        btnClass: 'btn-primary',
                        keys: ['enter'],
                        action: function(){
                            _that.parent().parent().remove();
                        }
                    },
                    cancel: {
                        btnClass: 'btn-danger',
                    },
                }
            });
        } else {
            $.confirm({
                title: 'Thông báo',
                content: 'Dữ liệu không thể xóa vui lòng thử lại',
                type: 'green',
                buttons: {
                    ok: {
                        text: "ok!",
                        btnClass: 'btn-primary',
                        keys: ['enter'],
                        action: function(){
                        }
                    },
                }
            });
        }
    });

    $(".preview-trooper").click(function (event) {
        event.preventDefault();
        let url = $(this).attr('href');
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
        }).done(function (result) {
            $(".preview").modal('show');
            if (result.html)
            {
                $("#preview").html('').append(result.html);
                $(".preview").modal('show');
            }
        })
    })
})