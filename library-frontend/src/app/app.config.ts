import { ApplicationConfig, provideZoneChangeDetection } from '@angular/core';
import { provideRouter } from '@angular/router';

import { provideHttpClient } from '@angular/common/http'; // IMPORTAR esto para poder recibir data de la API 

import { routes } from './app.routes';

export const appConfig: ApplicationConfig = {
  providers: [
    provideZoneChangeDetection({ eventCoalescing: true }), 
    provideRouter(routes), // IMPORTANTE para poder aplicar lo del router outlet
    provideHttpClient() // IMPORTANTE para recibir data de la API
  ]
};
