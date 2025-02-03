import { Injectable } from '@angular/core';

import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Book } from '../models/book.model';


@Injectable({
  providedIn: 'root'
})
export class BookService {

  private booksUrl = 'http://localhost:8000/api';
  private bookByIdUrl = 'http://localhost:8000/api'

  constructor(private http: HttpClient) { }

  getBooks(): Observable<Book[]> {
    return this.http.get<Book[]>(`${this.booksUrl}/books`);
  }

  getBookById(id: number): Observable<Book> {
    return this.http.get<Book>(`${this.booksUrl}/book/${id}`);
  }
  
}
