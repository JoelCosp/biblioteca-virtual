import { Component, Input  } from '@angular/core';
import { Book } from '../../models/book.model';
import { CommonModule } from '@angular/common';
import { RouterLink } from '@angular/router'; // // Necesario para poder usar los ROUTER LINK en el HTML

const GLOBAL_MATERIALS = [CommonModule, RouterLink];

@Component({
  selector: 'app-book-card',
  imports: [GLOBAL_MATERIALS],
  templateUrl: './book-card.component.html',
  styleUrl: './book-card.component.css'
})
export class BookCardComponent {
  @Input() book!: Book;  // Definir el input que recibirá el libro

  constructor() { }
}
