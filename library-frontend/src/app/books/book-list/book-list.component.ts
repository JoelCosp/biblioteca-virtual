import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';

import { BookService } from '../../services/book.service'; // Importamos el servicio para recibir la data de la API
import { Book } from '../../models/book.model';

import { BookCardComponent } from '../book-card/book-card.component'; // Componente CARD donde se imprime la info de los libros

const GLOBAL_MATERIALS = [CommonModule, BookCardComponent];

@Component({
  selector: 'app-book-list',
  imports: [GLOBAL_MATERIALS],
  templateUrl: './book-list.component.html',
  styleUrl: './book-list.component.css'
})

export class BookListComponent {

  nums : number[] = [1, 2, 3, 4, 5, 6, 7, 8]; // Array temporal para iterar las cards de los libros
  books : Book[] = [];
  
  constructor(private booksService: BookService) {}

  ngOnInit(): void {
    this.booksService.getBooks().subscribe((books) => {
      this.books = books;
      console.log(books);
    });
  }
}
