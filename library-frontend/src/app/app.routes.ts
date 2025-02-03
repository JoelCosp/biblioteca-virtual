import { Routes } from '@angular/router';

// IMPORTAMOS LOS COMPNENTES NECESARIOS PARA LAS RUTAS
import { BookListComponent } from './books/book-list/book-list.component';
import { BookDetailsComponent } from './books/book-details/book-details.component';

export const routes: Routes = [
    { path: '', component: BookListComponent },  // Ruta principal (Home)
    { path: 'details/:id', component: BookDetailsComponent }, // Ruta para ver los detalles del libro /// LE PASAMOS LA VARIABLE IS MEDIANTE LOS DOS ":"
    { path: '**', redirectTo: '', pathMatch: 'full' }  // Redirección para rutas no encontradas
];
