import './bootstrap';
import '@fortawesome/fontawesome-free/js/all';
// import '@popperjs/core';
// import './bootstrap';
// import 'owl.carousel/dist/assets/owl.carousel.css';
// import 'owl.carousel/dist/assets/owl.theme.default.css';
// import $ from 'jquery';
// import 'owl.carousel';

// window.$ = window.jQuery = $;

// $(document).ready(function () {
//   $('.owl-carousel').owlCarousel({
//     loop: true,
//     margin: 10,
//     nav: true,
//     dots: true,
//     responsive: {
//       0: {items: 1},
//       600: {items: 2},
//       1000:{items: 4}
//     }
//   });
// });

import {
  ClassicEditor,
  Essentials,
  Bold,
  Italic,
  Underline,
  Strikethrough,
  Font,
  Paragraph,
  Table,
  Indent,
  BlockQuote,
  List,
  Heading,
  Link,
  FindAndReplace,
  Subscript,
  Superscript,
  RemoveFormat,
  SpecialCharacters,
  HorizontalLine,
  Bookmark,
  Alignment,
  TodoList,
  TableToolbar,
  TableProperties,
  TableCellProperties
} from 'ckeditor5';


document.addEventListener('DOMContentLoaded', () => {


  ClassicEditor.create(document.querySelector("#editor"), {
    language: "es",
    licenseKey: "GPL", // Or 'GPL'.
    plugins: [
      Essentials,
      Paragraph,
      Bold,
      Italic,
      Font,
      Table,
      Indent,
      List,
      BlockQuote,
      Heading,
      Link,
      FindAndReplace,
      Underline,
      Strikethrough,
      Subscript,
      Superscript,
      RemoveFormat,
      SpecialCharacters,
      HorizontalLine,
      Bookmark,
      Alignment,
      TodoList,
      TableToolbar,
      TableProperties,
      TableCellProperties
    ],
    toolbar: [
      "undo",
      "redo",
      "|",
      "FindAndReplace",
      "bold",
      "italic",
      "Underline",
      "Strikethrough",
      "Subscript",
      "Superscript",
      "RemoveFormat",
      "|",
      "fontSize",
      "fontFamily",
      "fontColor",
      "fontBackgroundColor",
      "|",
      "SpecialCharacters",
      "HorizontalLine",
      "Bookmark",
      "|",
      "heading",
      "|",
      "insertTable",
      "|",
      "Alignment",
      "|",
      "numberedList",
      "bulletedList",
      "TodoList",
      "|",
      "blockQuote",
      "|",
      "link",
      "|",
      "outdent",
      "|",
      "indent",
    ],
    table: {
      contentToolbar: [
        "tableColumn",
        "tableRow",
        "mergeTableCells",
        "tableCellProperties",
        "tableProperties",
      ],
    },
  })
    .then((editor) => {
      window.editor = editor;
    })
    .catch((error) => {
      console.error(error);
    });
});


// Agrega EDU para el Catalogo, revisar !!!
// import $ from "jquery";
// import "turn.js";
// import { getDocument } from "pdfjs-dist";

// Hacer que Turn.js esté disponible globalmente
// window.$ = window.jQuery = $;
// window.turn = $.fn.turn;
