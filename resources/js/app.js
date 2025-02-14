import 'bootstrap';
import '@popperjs/core';
// import './bootstrap';

import $ from 'jquery';
import 'owl.carousel';
import '@fortawesome/fontawesome-free/js/all';

$(document).ready(function () {
  $('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    responsive: {
      0: { items: 1 },
      600: { items: 2 },
      1000: { items: 4 }
    }
  });
});

import {
  ClassicEditor,
  Essentials,
  Bold,
  Italic,
  Font,
  Paragraph,
  Table,
  Indent,
  BlockQuote,
  List,
  Heading,
  Link
} from 'ckeditor5';


document.addEventListener('DOMContentLoaded', () => {


  ClassicEditor
    .create(document.querySelector('#editor'), {
      language: 'es',
      licenseKey: 'GPL', // Or 'GPL'.
      plugins: [Essentials, Paragraph, Bold, Italic, Font, Table, Indent, List, BlockQuote, Heading, Link],
      toolbar: [
        'undo', 'redo', '|', 'bold', 'italic', '|',
        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|', 'heading', '|', 'insertTable', '|', 'numberedList', 'bulletedList', '|', 'blockQuote', '|', 'link', '|', 'outdent', '|', 'indent'
      ]
    })
    .then(editor => {
      window.editor = editor;
    })
    .catch(error => {
      console.error(error);
    });
});


