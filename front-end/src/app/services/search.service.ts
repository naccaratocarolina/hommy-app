import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class SearchService {
  apiURL: string = 'http://localhost:8000/api/';

  constructor(public http:HttpClient) { }

  //lista todas as republicas
  getListRepublic(): Observable<any> {
    return this.http.get(this.apiURL + 'listRepublic');
  }
}
