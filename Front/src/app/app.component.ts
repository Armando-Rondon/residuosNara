import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { ResiduoService } from './core/residuo/residuo.service';

@Component({
  selector: 'app-root',
  templateUrl: 'app.component.html',
  styleUrls: ['app.component.scss'],
})
export class AppComponent {
  private mostar: boolean = false;
  id: any;

  constructor(private residuoService: ResiduoService, private router: Router) {}

  newResiduo() {
    // Get max residuo Id from the residuo list
    this.residuoService.getMaxResiduoId().subscribe((data) => (this.id = data));
    this.router.navigate(['/residuos', this.id, 'new']);
  }

  showNavbar(){
    
  }


}
