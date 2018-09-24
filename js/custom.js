$(document).ready(function () {

    /*********invoice********/
    $('#invoice-term_type').on('change', function () {
        var val = $(this).val();
        if (val !== 'undefined' && val !== '') {
            jQuery.ajax({
                url: homeUrl + 'ajax/term-name',
                type: "POST",
                data: {val: val},
                success: function (data) {
                    var $data = JSON.parse(data);
                    $('#invoice-term_type_name').val($data.name);
                    $('#invoice_freight').val($data.freight);
                    $('#invoice_insurance').val($data.insurance);
//                 $(data.content).appendTo('<tr>');
                }
            });
        }
    });
    /*********outward invoice********/
    $('#outwardinvoice-term_type').on('change', function () {
        var val = $(this).val();
        if (val !== 'undefined' && val !== '') {
            jQuery.ajax({
                url: homeUrl + 'ajax/term-name',
                type: "POST",
                data: {val: val},
                success: function (data) {
                    var $data = JSON.parse(data);
                    $('#outwardinvoice-term_type_name').val($data.name);
                    $('#outwardinvoice_freight').val($data.freight);
                    $('#outwardinvoice_insurance').val($data.insurance);
//                 $(data.content).appendTo('<tr>');
                }
            });
        }
    });
    /*********nonpayment invoice********/
    $('#nonpaymentinvoice-term_type').on('change', function () {
        var val = $(this).val();
        if (val !== 'undefined' && val !== '') {
            jQuery.ajax({
                url: homeUrl + 'ajax/term-name',
                type: "POST",
                data: {val: val},
                success: function (data) {
                    var $data = JSON.parse(data);
                    $('#nonpaymentinvoice-term_type_name').val($data.name);
                    $('#nonpaymentinvoice_freight').val($data.freight);
                    $('#nonpaymentinvoice_insurance').val($data.insurance);
//                 $(data.content).appendTo('<tr>');
                }
            });
        }
    });

    /*****************/

    $('.add_container_details').on('click', function () {
        $("#container_details").toggle('slow');
    });
    $('.more_container').on('click', function () {
        var form = $(this).attr('attr_id');
        var i = $('#container_details_body tr').length + 1;
        var row = rowcheck(i);

//        var i = $('#container_details_body tr').length + 1;
        jQuery.ajax({
            url: homeUrl + 'ajax/more-container',
            type: "POST",
            data: {keyword: i, form: form},
            success: function (data) {
                var $data = JSON.parse(data);
                $('#container_details tbody').append($data.content);
//                 $(data.content).appendTo('<tr>');
            }
        });
    });
    $('body').on('click', '.remScnt', function () {
        var id = $(this).attr('id');
        $('#td_' + id).remove();
    });
    /**************Item***********/

    $('.item-item_code').on('keyup', function (e) {
        var attr = $(this).attr('attr_item');
        if ($(this).val() === "") {
            $('.itemcode_field').val('');
        } else {
            jQuery.ajax({
                url: homeUrl + 'ajax/find-item',
                type: "POST",
                data: {keyword: $(this).val(), dropdown: 'search-itemcode', attr: attr},
                success: function (data) {
                    if (data === '') {
                        $('.itemcode_field').val('');
                    } else {
                        jQuery('.search-keyword-item_code').html(data);
                    }
                },
            });
        }
    });
    $('body').on('click', '.search-itemcode', function () {
        var id = $(this).attr('id');
        var attr = $(this).attr('attr_item');
        jQuery.ajax({
            url: homeUrl + 'ajax/item-master',
            type: "POST",
            data: {id: id},
            success: function (data) {
                var $data = JSON.parse(data);
                if ($data.msg === "success") {
                    $('#' + attr + '-item_id').val($data.id);
                    $('#' + attr + '-item_code').val($data.code);
                    $('#' + attr + '-description').val($data.description);
                    $('#' + attr + '-country_origin').val($data.country_of_orgin);
                    $('#' + attr + '-brand').val($data.brand);
                    jQuery('.search-keyword-item_code').html('');
                }

            }
        });

    });
    /*************************/


    jQuery('#invoice-manufacturer_code').on('keyup', function (e) {
        if ($(this).val() === "") {
            $('.manufacturer_field').val('');
        } else {
            partydropdown($(this).val(), 'search-manufacturer', 'search-keyword-manufacturer', '4', 'manufacturer_field');
        }
    });
    $('body').on('click', '.search-manufacturer', function () {
        var id = $(this).attr('id');
        findagent(id, 'invoice-manufacturer_');
    });
    /*****************************/
    jQuery('#party-declarant_code').on('keyup', function (e) {
        if ($(this).val() === "") {
            $('.declarant_field').val('');
        } else {
            partydropdown($(this).val(), 'search-declarant', 'search-keyword-declarant', '0', 'declarant_field');
        }
    });
    $('body').on('click', '.search-declarant', function () {
        var id = $(this).attr('id');
        findagent(id, 'party-declarant_');
    });
    /*********************/
    jQuery('#party-importer_code').on('keyup', function (e) {
        if (jQuery(this).val()[0] === " ") {
            $('.importer_field').val('');
        } else {
            partydropdown($(this).val(), 'search-importer', 'search-keyword-importer', '2', 'importer_field');
        }
    });
    $('body').on('click', '.search-importer', function () {
        var id = $(this).attr('id');
        findagent(id, 'party-importer_');
    });
    /********************/
    jQuery('#party-frieght_forwarder_code').on('keyup', function (e) {
        if (jQuery(this).val()[0] === " ") {
            $('.frieght_field').val('');
        } else {
            partydropdown($(this).val(), 'search-frieght_forwarder', 'search-keyword-frieght_forwarder', '1', 'frieght_field');
        }
    });
    $('body').on('click', '.search-frieght_forwarder', function () {
        var id = $(this).attr('id');
        findagent(id, 'party-frieght_forwarder_');
    });
    /********************/
    jQuery('#party-inward_agent_code').on('keyup', function (e) {
        if (jQuery(this).val()[0] === " ") {
            $('.inward_field').val('');
        } else {
            partydropdown($(this).val(), 'search-inward_agent', 'search-keyword-inward_agent', '3', 'inward_field');
        }
    });
    $('body').on('click', '.search-inward_agent', function () {
        var id = $(this).attr('id');
        findagent(id, 'party-inward_agent_');
    });
    /********************/
    jQuery('#party-claimant_party_claimant_id').on('keyup', function (e) {
        if (jQuery(this).val()[0] === " ") {
            $('.claimant_field').val('');
        } else {
            jQuery.ajax({
                url: homeUrl + 'ajax/search-claimantkeyword',
                type: "POST",
                data: {keyword: $(this).val()},
                success: function (data) {
                    if (data === '') {
                        $('.claimant_field').val('');
                    } else {
                        jQuery('.search-keyword-claimant_party').html(data);
                    }
                }
            });
        }
    });
    $('body').on('click', '.search-claimant', function () {
        var id = $(this).attr('id');
        jQuery.ajax({
            url: homeUrl + 'ajax/search-claimant',
            type: "POST",
            data: {id: id},
            success: function (data) {
                var $data = JSON.parse(data);
                if ($data.msg === "success") {
                    $('#party-claimant_party_id').val($data.id);
                    $('#party-claimant_party_name1').val($data.name1);
                    $('#party-claimant_party_name2').val($data.name1);
                    $('#party-claimant_party_cr_uei').val($data.cruei);
                    $('#party-claimant_party_claimant_name').val($data.claimant_name);
                    $('#party-claimant_party_claimant_id').val($data.claimant_id);
                    jQuery('.search-keyword-dropdown').html('');
                }

            }
        });
    });
});
/***********************************************************************************************/
function rowcheck(i) {
    if ($("#td_" + i).length !== 0) {
        i = i + 1;
        rowcheck(i);
    }
}
function findagent(id, dropdown) {
    jQuery.ajax({
        url: homeUrl + 'ajax/search-agent',
        type: "POST",
        data: {id: id},
        success: function (data) {
            var $data = JSON.parse(data);
            if ($data.msg === "success") {
                $('#' + dropdown + 'id').val($data.id);
                $('#' + dropdown + 'name1').val($data.name1);
                $('#' + dropdown + 'name2').val($data.name1);
                $('#' + dropdown + 'cruei').val($data.cruei);
                $('#' + dropdown + 'code').val($data.code);
                jQuery('.search-keyword-dropdown').html('');
            }

        }
    });
}
function partydropdown(keyword, dropdown, searchplace, type, emptyfield) {
    jQuery.ajax({
        url: homeUrl + 'ajax/search-keyword',
        type: "POST",
        data: {keyword: keyword, dropdown: dropdown, type: type},
        success: function (data) {
            if (data === '') {
                $('.' + emptyfield).val('');
            } else {
                jQuery('.' + searchplace).html(data);
            }
        },
    });
}