import { Component, OnInit, inject } from '@angular/core';
import { BookService } from '../../services/book.service';
import { Observable } from 'rxjs';
import { Book } from '../../models/book.model';

import { ActivatedRoute } from '@angular/router'; // Para acceder a los PARAMETROS de la URL

@Component({
  selector: 'app-book-details',
  imports: [],
  templateUrl: './book-details.component.html',
  styleUrl: './book-details.component.css'
})
export class BookDetailsComponent {
  private route = inject(ActivatedRoute);
  id!: string;
  book: Book | null = null;

  constructor(
    private urlRoute: ActivatedRoute,
    private booksService: BookService
  ) {}

  ngOnInit() {
    this.urlRoute.paramMap.subscribe((params) => {
      this.id = params.get('id')!;
      
      // Llamamos al servicio una vez que tenemos el ID
      this.booksService.getBookById(Number(this.id)).subscribe((book) => {
        this.book = book;
        //console.log("---> LIBRO MOSTRADO: ", this.book);
      });
    });
  }
}
