import { Component, OnInit } from '@angular/core';
import { ResiduoService } from '../../core/residuo/residuo.service';
import { Router } from '@angular/router';


@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.scss'],
})
export class NavbarComponent implements OnInit {
  id: any;

  constructor(private residuoService: ResiduoService, private router: Router) {}

  ngOnInit() {}

  newResiduo() {
    // Get max residuo Id from the residuo list
    this.residuoService.getMaxResiduoId().subscribe((data) => (this.id = data));
    this.router.navigate(['/residuos', this.id, 'new']);
  }
}
