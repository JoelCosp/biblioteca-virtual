import { Component, OnInit } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { initFlowbite } from 'flowbite';

// Componentes a importar
import { NavbarComponent } from './shared/navbar/navbar.component';
import { FooterComponent } from './shared/footer/footer.component';
import { BookListComponent } from './books/book-list/book-list.component';

const GLOBAL_MATERIALS = [RouterOutlet, NavbarComponent, FooterComponent, BookListComponent];

@Component({
  selector: 'app-root',
  imports: [GLOBAL_MATERIALS],
  templateUrl: './app.component.html',
  styleUrl: './app.component.css'
})
export class AppComponent implements OnInit{
  title = 'library-frontend';

  ngOnInit(): void {
    initFlowbite();
  }
}
