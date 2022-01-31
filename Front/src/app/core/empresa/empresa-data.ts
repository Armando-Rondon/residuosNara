import { InMemoryDbService, RequestInfo } from 'angular-in-memory-web-api';
import { Observable } from 'rxjs';

export class EmpresaData implements InMemoryDbService {
  createDb() {
    let empresas = [
      {
        id: 0,
        nif: 111111,
        nombre: 'Uno',
        residuos: [],
        sector: 'Industrial',
        localidad: 'Pamplona',
      },
      {
        id: 1,
        nif: 111111,
        nombre: 'Dos',
        residuos: [],
        sector: 'Industrial',
        localidad: 'Pamplona',
      },
      {
        id: 2,
        nif: 111111,
        nombre: 'Tres',
        residuos: [],
        sector: 'Industrial',
        localidad: 'Pamplona',
      },
      {
        id: 3,
        nif: 111111,
        nombre: 'Cuatro',
        residuos: [],
        sector: 'Industrial',
        localidad: 'Pamplona',
      }
    ];
    return { empresas: empresas };
  }
}
