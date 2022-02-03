import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';

import { Observable, of, throwError } from 'rxjs';
import { catchError, tap, map } from 'rxjs/operators';

import { Residuo } from '../../shared/residuo';

@Injectable({
  providedIn: 'root',
})
export class ResiduoService {
  private residuosUrl = 'https://localhost:8000/residuos/';

  constructor(private http: HttpClient) {}

  getResiduos(): Observable<Residuo[]> {
    return this.http.get<Residuo[]>(this.residuosUrl).pipe(
      tap((data) => console.log(JSON.stringify(data))),
      catchError(this.handleError)
    );
  }

  getMaxResiduoId(): Observable<number> {
    return this.http.get<Residuo[]>(this.residuosUrl).pipe(
      // Get max value from an array
      map((data) =>
        Math.max.apply(
          Math,
          data.map(function (o) {
            return o.id;
          })
        )
      ),
      catchError(this.handleError)
    );
  }

  getResiduoById(id: number): Observable<Residuo> {
    const url = `${this.residuosUrl}${id}`;
    return this.http.get<Residuo>(url).pipe(
      tap((data) => console.log('getResiduo: ' + JSON.stringify(data))),
      catchError(this.handleError)
    );
  }

  createResiduo(residuo: Residuo): Observable<Residuo> {
    const headers = new HttpHeaders({ 'Content-Type': 'application/json' });
    const url = `${this.residuosUrl}new`;
    return this.http.post<Residuo>(url, residuo, { headers: headers }).pipe(
      tap((data) => console.log('createResiduo: ' + JSON.stringify(data))),
      catchError(this.handleError)
    );
  }

  deleteResiduo(id: number): Observable<{}> {
    const headers = new HttpHeaders({ 'Content-Type': 'application/json' });
    const url = `${this.residuosUrl}${id}`;
    return this.http.delete<Residuo>(url, { headers: headers }).pipe(
      tap((data) => console.log('deleteResiduo: ' + id)),
      catchError(this.handleError)
    );
  }

  updateResiduo(residuo: Residuo): Observable<Residuo> {
    const headers = new HttpHeaders({ 'Content-Type': 'application/json' });
    const url = `${this.residuosUrl}${residuo.id}/edit`;
    return this.http.put<Residuo>(url, residuo, { headers: headers }).pipe(
      tap(() => console.log('updateResiduo: ' + residuo.id)),
      // Return the residuo on an update
      map(() => residuo),
      catchError(this.handleError)
    );
  }

  private handleError(err: any) {
    // in a real world app, we may send the server to some remote logging infrastructure
    // instead of just logging it to the console
    let errorMessage: string;
    if (err.error instanceof ErrorEvent) {
      // A client-side or network error occurred. Handle it accordingly.
      errorMessage = `An error occurred: ${err.error.message}`;
    } else {
      // The backend returned an unsuccessful response code.
      // The response body may contain clues as to what went wrong,
      errorMessage = `Backend returned code ${err.status}: ${err.body.error}`;
    }
    console.error(err);
    return throwError(errorMessage);
  }
}
