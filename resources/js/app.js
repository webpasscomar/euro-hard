import './bootstrap';
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


document.addEventListener('DOMContentLoaded',()=>{


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


