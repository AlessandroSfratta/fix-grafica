// File: fix-grafica.js



jQuery(document).ready(function($) {

    console.log('Fix Grafica JS attivo');



    let totale = 0;

    const iva = 0.22;

    let currentStep = 1;

    const totalSteps = $('.fix-step').length;



    function aggiornaInvestimento() {

        if (totale > 0) {

            const totaleIvato = (totale * (1 + iva)).toFixed(2);

            $('#fix-investimento').text(`investimento: ${totaleIvato}€`);

        } else {

            $('#fix-investimento').text('');

        }

    }



    function calcolaTotaleDinamico() {

        totale = 0;



        $('.fix-option.selected').each(function () {

            const prezzo = parseFloat($(this).data('price')) || 0;

            totale += prezzo;

        });



        if ($('#form-logo-personalizzato').is(':visible')) {

            const prezzoLogo = parseFloat($('#form-logo-personalizzato').data('price')) || 0;

            totale += prezzoLogo;

        }



        // Prezzo dinamico per i social

        if ($('#form-social').is(':visible')) {

            const socialQty = parseInt($('#social_qty').val()) || 0;

            let prezzoUnitario = 0;



            if (socialQty === 1 || socialQty === 2) prezzoUnitario = 50;

            else if (socialQty >= 3 && socialQty <= 5) prezzoUnitario = 40;

            else if (socialQty === 6 || socialQty === 7) prezzoUnitario = 35;

            else if (socialQty >= 8) prezzoUnitario = 30;



            const subtotale = prezzoUnitario * socialQty;

            $('#form-social .modulo-prezzo').text(`${prezzoUnitario}€ x ${socialQty} = ${subtotale}€`);

            totale += subtotale;

        }



        // Prezzo dinamico per il sito

        if ($('#form-sito').is(':visible')) {

            const sitoQty = parseInt($('#sito_qty').val()) || 0;

            let prezzoUnitario = 0;



            if (sitoQty === 1) prezzoUnitario = 60;

            else if (sitoQty === 2) prezzoUnitario = 50;

            else if (sitoQty >= 3) prezzoUnitario = 40;



            const subtotale = prezzoUnitario * sitoQty;

            $('#form-sito .modulo-prezzo').text(`${prezzoUnitario}€ x ${sitoQty} = ${subtotale}€`);

            totale += subtotale;

        }



        // Prezzo fisso per il modulo WhatsApp

        if ($('#form-whatsapp').is(':visible')) {

            const whatsappQty = parseInt($('#whatsapp_qty').val()) || 0;

            const prezzoUnitario = 30;

            const subtotale = prezzoUnitario * whatsappQty;



            $('#form-whatsapp .modulo-prezzo').text(`${prezzoUnitario}€ x ${whatsappQty} = ${subtotale}€`);

            totale += subtotale;

        }



        // Prezzo fisso per il modulo Volantino

        if ($('#form-volantino').is(':visible')) {

            const volantinoQty = parseInt($('#volantino_qty').val()) || 0;

            const prezzoUnitario = 45;

            const subtotale = prezzoUnitario * volantinoQty;



            $('#form-volantino .modulo-prezzo').text(`${prezzoUnitario}€ x ${volantinoQty} = ${subtotale}€`);

            totale += subtotale;

        }



        // Prezzo fisso per il modulo Biglietto da visita

        if ($('#form-biglietto').is(':visible')) {

            const bigliettoQty = parseInt($('#biglietto_qty').val()) || 0;

            const prezzoUnitario = 30;

            const subtotale = prezzoUnitario * bigliettoQty;



            $('#form-biglietto .modulo-prezzo').text(`${prezzoUnitario}€ x ${bigliettoQty} = ${subtotale}€`);

            totale += subtotale;

        }



        /* Prezzo fisso per la LOCANDINA 45€ */

        if ($('#form-locandina').is(':visible')) {

            const locQty        = parseInt($('#locandina_qty').val()) || 0;

            const prezzoUnitario = 45;                       // € + IVA

            const subtotale      = prezzoUnitario * locQty;



            // mostra il riepilogo subito sotto al selettore quantità

            $('#form-locandina .modulo-prezzo')

                .text(`${prezzoUnitario}€ x ${locQty} = ${subtotale}€`);



            totale += subtotale;

        }



        // Prezzo fisso per i manifesti

        if ($('#form-manifesto').is(':visible')) {

            const qty = parseInt($('#manifesto_qty').val()) || 0;

            const prezzoUnitario = 45;

            const subtotale = prezzoUnitario * qty;

            $('#form-manifesto .modulo-prezzo').text(`${prezzoUnitario}€ x ${qty} = ${subtotale}€`);

            totale += subtotale;

        }



        // Prezzo fisso per i rollup

        if ($('#form-rollup').is(':visible')) {

            const qty = parseInt($('#rollup_qty').val()) || 0;

            const prezzoUnitario = 50;

            const subtotale = prezzoUnitario * qty;

            $('#form-rollup .modulo-prezzo').text(`${prezzoUnitario}€ x ${qty} = ${subtotale}€`);

            totale += subtotale;

        }



        // Prezzo fisso per le brochure

        if ($('#form-brochure').is(':visible')) {

            const qty = parseInt($('#brochure_qty').val()) || 0;

            const prezzoUnitario = 50;

            const subtotale = prezzoUnitario * qty;

            $('#form-brochure .modulo-prezzo').text(`${prezzoUnitario}€ x ${qty} = ${subtotale}€`);

            totale += subtotale;

        }





//catalogo

        if ($('#form-catalogo').is(':visible')) {

            const catalogoQty = parseInt($('#catalogo_qty').val()) || 0;

            const prezzoUnitario = 100;

            const subtotale = prezzoUnitario * catalogoQty;



            $('#form-catalogo .modulo-prezzo').text(`${prezzoUnitario}€ x ${catalogoQty} = ${subtotale}€`);

            totale += subtotale;



            generaBlocchiCatalogo(catalogoQty); // Se vuoi aggiornare anche i blocchi

        }













$('.modulo-form:visible').each(function () {

    const id = $(this).attr('id');

    if (id === 'form-social' || id === 'form-sito' || id === 'form-whatsapp' || id === 'form-volantino' || id === 'form-biglietto' || id === 'form-locandina' || id === 'form-manifesto' || id === 'form-rollup' || id === 'form-brochure' || id === 'form-catalogo') return;



    const prezzoUnitario = parseFloat($(this).data('price')) || 0;

    const qtyInput = $(this).find('.modulo-quantita');

    if (qtyInput.length) {

        const qty = parseInt(qtyInput.val()) || 0;

        const subtotale = prezzoUnitario * qty;

        const prezzoText = qty > 1 ? `${prezzoUnitario}€ x ${qty} = ${subtotale}€` : `${prezzoUnitario}€`;

        $(this).find('.modulo-prezzo').text(prezzoText);

        totale += subtotale;

    }

});







        aggiornaInvestimento();

    }



function mostraStep(step) {
    $('.fix-step').hide();
    $(`.fix-step[data-step="${step}"]`).show();

    $('.fix-prev-btn').toggle(step > 1);
    $('.fix-next-btn').text(step === totalSteps ? 'Vai al pagamento' : 'Avanti');

    // Forza la visibilità corretta SOLO se siamo nello step 3
    if (step === 3) {
        $('.fix-grafica-modulo').each(function () {
            if (!$(this).hasClass('visibilmente-attivo')) {
                $(this).show();
            }
        });
    } else {
        $('.fix-grafica-modulo').each(function () {
            $(this).hide();
        });
    }

    if (step === 3) {
        calcolaTotaleDinamico();

        const fileInput = $('.fix-option[data-value="si"] .fix-upload-input')[0];
        if (fileInput && fileInput.files.length > 0) {
            const file = fileInput.files[0];
            const fileURL = URL.createObjectURL(file);
            const previewContainer = $('#fix-logo-preview');
            previewContainer.empty();

            if (file.type === "application/pdf") {
                previewContainer.append(`
                    <span class="logo-label">Logo caricato (PDF)</span>
                    <a class="logo-button" href="${fileURL}" target="_blank">Apri logo</a>
                `);
            } else if (file.type.startsWith("image/")) {
                previewContainer.append(`
                    <span class="logo-label">Logo caricato</span>
                    <img src="${fileURL}" alt="Anteprima logo" />
                `);
            }

            previewContainer.show();
        }
    }
}




    mostraStep(currentStep);



    $('.fix-next-btn').on('click', function() {

        const stepCorrente = $(`.fix-step[data-step="${currentStep}"]`);

        const selezione = stepCorrente.find('.fix-option.selected');



        if (selezione.length === 0 && currentStep !== 3) {

            alert('Seleziona almeno un’opzione per procedere.');

            return;

        }



        if (currentStep === 1) {

            const selectedValue = selezione.data('value');

            if (selectedValue === 'si') {

                const fileInput = selezione.find('.fix-upload-input');

                if (!fileInput[0].files.length) {

                    alert('Per procedere devi allegare un file.');

                    return;

                }

            }

        }



        if (currentStep < totalSteps) {

            currentStep++;

            mostraStep(currentStep);

        } else {

            const logo = $('.fix-option[data-type="logo"].selected').data('value');

            const obiettivo = $('.fix-step[data-step="2"] .fix-option.selected').text().trim();



            let canali = [];

            $('.canale-checkbox:checked').each(function () {

                canali.push($(this).val());

            });

            if ($('#checkbox-parlare').is(':checked')) {

                canali = ['voglio parlare con qualcuno'];

            }



            const prezzo = totale.toFixed(2);

            const url = new URL('/?add-to-cart=6232', window.location.origin);

            url.searchParams.append('logo', logo);

            url.searchParams.append('obiettivo', obiettivo);

            url.searchParams.append('canale', canali.join(', '));

            url.searchParams.append('prezzo_personalizzato', prezzo);

let datiGrafica = {};

$('.modulo-form:visible').each(function () {
    const inputs = $(this).find('input, textarea, select');
    inputs.each(function () {
        const name = $(this).attr('name');
        let value = $(this).val();
        if (value && typeof value === 'string') {
            value = value.replace(/^C:\\fakepath\\/, '');
        }
        if (name && value) {
            datiGrafica[name] = value;
        }
    });
});

// Aggiunge l'URL del logo caricato via AJAX
const uploadedLogoUrl = $('input[name="upload_logo"]').val();
if (uploadedLogoUrl) {
    datiGrafica['upload_logo'] = uploadedLogoUrl;
}
datiGrafica['prezzo_personalizzato'] = (totale * 1.22).toFixed(2);
// Converte in query string
const query = new URLSearchParams(datiGrafica).toString();
url.searchParams.append('fix_grafica_data', query);



            window.location.href = url.toString();

        }

    });



    $('.fix-prev-btn').on('click', function() {

        if (currentStep > 1) {

            currentStep--;

            mostraStep(currentStep);

        }

    });



    $('.fix-step .fix-option').on('click', function() {

        const step = $(this).closest('.fix-step');

        step.find('.fix-option').removeClass('selected');

        $(this).addClass('selected');

        calcolaTotaleDinamico();

    });



    $(document).on('click', '.fix-upload-btn', function(e) {

        $(this).siblings('.fix-upload-input').trigger('click');

        e.stopPropagation();

    });



    $(document).on('change', '.fix-upload-input', function () {

        const fileInput = $(this)[0];
        const file = fileInput.files[0];
        if (!file) return;

        const $input = $(this);
        const container = $input.closest('.fix-option, .upload-row');

        const isLogo = $input.closest('.fix-option[data-type="logo"]').length > 0;

        const originalName = $input.attr('name') || '';

        container.find('.fix-file-name, .fix-progress-bar').remove();
        const progressBar = $('<div class="fix-progress-bar"><div class="fix-progress-fill"></div></div>');
        container.append(progressBar);

        const formData = new FormData();
        formData.append('action', isLogo ? 'fix_upload_logo' : 'fix_upload_file');
        formData.append('nonce', fix_upload.nonce);
        formData.append('upload_file', file);

        $.ajax({
            url: fix_upload.ajax_url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            xhr: function() {
                const xhr = $.ajaxSettings.xhr();
                if (xhr.upload) {
                    xhr.upload.addEventListener('progress', function(e) {
                        if (e.lengthComputable) {
                            const pct = (e.loaded / e.total) * 100;
                            progressBar.find('.fix-progress-fill').css('width', pct + '%');
                        }
                    });
                }
                return xhr;
            },
            success: function (response) {
                if (response.success) {
                    const fileUrl = response.data.url;
                    const relativePath = fileUrl.split('/uploads/')[1];

                    if (isLogo) {
                        $('#fix-logo-preview').html('<img src="' + fileUrl + '" />').show();
                        $('input[name="upload_logo"]').remove();
                        $('<input>').attr({
                            type: 'hidden',
                            name: 'upload_logo',
                            value: relativePath
                        }).appendTo('#fix-grafica-form');
                    } else {
                        const hidden = $('<input>').attr({
                            type: 'hidden',
                            name: originalName,
                            value: relativePath
                        });
                        $input.siblings('input[type="hidden"][name="' + originalName.replace(/\[/g, '\\[').replace(/\]/g, '\\]') + '"]').remove();
                        $input.after(hidden);
                    }

                    progressBar.find('.fix-progress-fill').css('width', '100%');
                    container.append('<div class="fix-file-name">Hai caricato: ' + file.name + '</div>');
                    if (originalName) {
                        $input.attr('name', '');
                    }
                } else {
                    alert('Errore: ' + response.data);
                }
            },
            error: function () {
                alert('Errore upload');
            }
        });

    });

$('.canale-checkbox').on('change', function () {

    const targetId = $(this).data('target');



    if ($(this).is(':checked')) {

        $('#' + targetId).slideDown(function () {

            // se è il modulo WhatsApp, clona almeno 1 blocco

            if (targetId === 'form-whatsapp') {

                const qty = parseInt($('#whatsapp_qty').val()) || 1;

                generaBlocchiWhatsApp(qty);

            }

        });

    } else {

        $('#' + targetId).slideUp();

    }

    calcolaTotaleDinamico();

});


});








$('#checkbox-parlare').on('change', function () {

    if ($(this).is(':checked')) {

        // Disattiva e resetta tutti gli altri canali

        $('.canale-checkbox').prop('checked', false).prop('disabled', true).trigger('change');



        // Nasconde tutti gli altri moduli tranne il form "parlare"

        $('.modulo-form').not('#form-parlare').slideUp();



        // Mostra modulo personalizzato

        $('#form-parlare').slideDown();

        $('#form-parlare .form-contatto').slideDown();



        // Nasconde bottone "Vai al pagamento"

        $('.fix-next-btn').hide();



        // Azzera totale

        $('#fix-investimento').text('');

    } else {

        // Riattiva gli altri canali

        $('.canale-checkbox').prop('disabled', false);

        $('#form-parlare').slideUp();

        $('#form-parlare .form-contatto').slideUp();



        // Mostra bottone avanti

        $('.fix-next-btn').show();



        // Ricalcola eventuale totale

        calcolaTotaleDinamico();

    }

});













// Quando seleziona un’altra opzione logo (diversa da "voglio realizzarlo")

$('.fix-step .fix-option').on('click', function() {

    const step = $(this).closest('.fix-step');

    step.find('.fix-option').removeClass('selected');

    $(this).addClass('selected');



    const isLogoStep = $(this).data('type') === 'logo';

    const isRealizzarlo = $(this).data('value') === 'voglio-realizzarlo';



    if (isLogoStep && isRealizzarlo) {

        // LOGO PERSONALIZZATO

        $('.canale-checkbox').prop('checked', false).prop('disabled', true);

        $('.modulo-form').slideUp();

        $('#form-logo-personalizzato').slideDown();

        $('.fix-next-btn').hide();

        $('#fix-investimento').hide();

        totale = 0;

        aggiornaInvestimento();

    } else if (isLogoStep) {

        // ALTRA OPZIONE LOGO

        $('.canale-checkbox').prop('disabled', false);

        $('#form-logo-personalizzato').slideUp();

        $('.fix-next-btn').show();

        $('#fix-investimento').show();

        calcolaTotaleDinamico();

    } else {

        calcolaTotaleDinamico();

    }

});



























$(document).on('click', '.add-upload-btn', function () {

    const targetId = $(this).data('target'); // es. "upload-social-1" o "upload-whatsapp-2"

    const newUpload = `

        <div class="upload-row">

            <input type="file" name="${targetId}[]" accept=".jpg,.jpeg,.png,.webp,.pdf">

            <button type="button" class="remove-upload" title="Rimuovi">✖</button>

        </div>

    `;

    $('#' + targetId).append(newUpload);

});











    $(document).on('click', '.remove-upload', function () {

        $(this).closest('.upload-row').remove();

    });



    $('input.sito-radio').on('change', function () {

        if ($(this).val() === 'si') {

            $('#sito-url-wrapper').slideDown();

        } else {

            $('#sito-url-wrapper').slideUp();

            $('#sito_url').val('');

        }

    });



    $('input.sito-radio').on('change', function () {

        if ($(this).val() === 'si') {

            $('#sito-url-wrapper').slideDown();

        } else {

            $('#sito-url-wrapper').slideUp().find('input').val('');

        }

    });



    $('.formato-select').on('change', function () {

        const device = $(this).data('target');

        const selected = $(this).val();

        const customBox = $(`#custom-${device}`);

        if (selected === 'custom') {

            customBox.slideDown();

        } else {

            customBox.slideUp().find('input').val('');

        }

    });



    function generaBlocchiSito(qty) {

        const container = $('#sito-slide-container');

        const template = $('#sito-slide-template').html();

        container.empty();



        for (let i = 1; i <= qty; i++) {

            const blocco = template.replaceAll('__INDEX__', i);

            container.append(blocco);

        }

    }



    $('#sito_qty').on('input change', function () {

        const qty = parseInt($(this).val()) || 1;

        generaBlocchiSito(qty);

        calcolaTotaleDinamico();

    });



    generaBlocchiSito(1);



    $(document).on('change', '.formato-select', function () {

        const id = $(this).data('target');

        if ($(this).val() === 'custom') {

            $(`#custom-${id}`).slideDown();

        } else {

            $(`#custom-${id}`).slideUp().find('input').val('');

        }

    });



    $(document).on('change', '.sito-radio', function () {

        const index = $(this).data('index');

        const wrapper = $(`#sito-url-wrapper-${index}`);

        if ($(this).val() === 'si') {

            wrapper.slideDown();

        } else {

            wrapper.slideUp().find('input').val('');

        }

    });



    // ---------- BLOCCO DINAMICO SOCIAL ----------

    function generaBlocchiSocial(qty) {

        const container = $('#social-slide-container');

        const template  = $('#social-slide-template').html();

        container.empty();



        for (let i = 1; i <= qty; i++) {

            container.append(template.replaceAll('__INDEX__', i));

        }

    }



/* ---------- BLOCCO DINAMICO BIGLIETTI DA VISITA ---------- */

function generaBlocchiBiglietto(qty) {

    const container = $('#biglietto-slide-container');

    const template = $('#biglietto-slide-template').html();

    container.empty();



    for (let i = 1; i <= qty; i++) {

        container.append(template.replaceAll('__INDEX__', i));

    }

}



/* ---------- BLOCCO DINAMICO WHATSAPP ---------- */

function generaBlocchiWhatsApp(qty) {

    const container = $('#whatsapp-slide-container');

    const template  = $('#whatsapp-slide-template').html();

    container.empty();



    for (let i = 1; i <= qty; i++) {

        container.append(template.replaceAll('__INDEX__', i));

    }

}



/* ---------- BLOCCO DINAMICO VOLANTINO ---------- */

function generaBlocchiVolantino(qty) {

    const container = $('#volantino-slide-container');

    const template  = $('#volantino-slide-template').html();

    container.empty();



    for (let i = 1; i <= qty; i++) {

        container.append(template.replaceAll('__INDEX__', i));

    }

}

/* ---------- BLOCCO DINAMICO LOCANDINA ---------- */

function generaBlocchiLocandina(qty) {

    const container = $('#locandina-slide-container');

    const template  = $('#locandina-slide-template').html();

    container.empty();



    for (let i = 1; i <= qty; i++) {

        container.append(template.replaceAll('__INDEX__', i));

    }

}



/* ---------- BLOCCO DINAMICO MANIFESTO ---------- */

function generaBlocchiManifesto(qty) {

    const container = $('#manifesto-slide-container');

    const template  = $('#manifesto-slide-template').html();

    container.empty();



    for (let i = 1; i <= qty; i++) {

        container.append(template.replaceAll('__INDEX__', i));

    }

}



/* ---------- BLOCCO DINAMICO ROLLUP ---------- */

function generaBlocchiRollup(qty) {

    const container = $('#rollup-slide-container');

    const template  = $('#rollup-slide-template').html();

    container.empty();



    for (let i = 1; i <= qty; i++) {

        container.append(template.replaceAll('__INDEX__', i));

    }

}

/*------ CATALOGO ----*/

function generaBlocchiCatalogo(qty) {

    const container = $('#catalogo-slide-container');

    const template = $('#catalogo-slide-template').html();

    container.empty();



    for (let i = 1; i <= qty; i++) {

        container.append(template.replaceAll('__INDEX__', i));

    }

}















/* ---------- BLOCCO DINAMICO BROCHURE ---------- */

function generaBlocchiBrochure(qty) {

    const container = $('#brochure-slide-container');

    const template  = $('#brochure-slide-template').html();

    container.empty();



    for (let i = 1; i <= qty; i++) {

        container.append(template.replaceAll('__INDEX__', i));

    }

}



$(document).on('input change', '.modulo-quantita', function () {

    const container = $(this).closest('.quantity-control');

    const target = container.data('target');

    const val = parseInt($(this).val()) || 1;



    if (typeof blocchiGeneratori[target] === 'function') {

        blocchiGeneratori[target](val);

    }

    calcolaTotaleDinamico();

});





    generaBlocchiSocial(1);

    generaBlocchiSito(1);

    generaBlocchiWhatsApp(1);

    generaBlocchiBiglietto(1);

    generaBlocchiVolantino(1);

    generaBlocchiLocandina(1);

    generaBlocchiManifesto(1);

    generaBlocchiRollup(1);

    generaBlocchiCatalogo(1);

    generaBlocchiBrochure(1);











// ⬇️ METTILO QUI

const blocchiGeneratori = {

    social  : generaBlocchiSocial,

    sito    : generaBlocchiSito,

    whatsapp: generaBlocchiWhatsApp,

    biglietto: generaBlocchiBiglietto,

    volantino  : generaBlocchiVolantino,

    locandina : generaBlocchiLocandina,

    manifesto: generaBlocchiManifesto,

    rollup: generaBlocchiRollup,

    catalogo: generaBlocchiCatalogo,

    brochure: generaBlocchiBrochure

};





$(document).on('click', '.quantity-control .qty-btn', function () {

    const container = $(this).closest('.quantity-control');

    const target = container.data('target');

    const input = container.find('.modulo-quantita');

    let val = parseInt(input.val()) || 1;



    val = $(this).hasClass('plus') ? val + 1 : Math.max(val - 1, 1);

    input.val(val).trigger('change');



    if (typeof blocchiGeneratori[target] === 'function') {

        blocchiGeneratori[target](val);

    }

    calcolaTotaleDinamico();

});



$(document).on('change', '.catalogo-radio', function () {

    calcolaTotaleDinamico();

});





});

