import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { ResiduoService } from './core/residuo/residuo.service';
import { AuthService } from './shared/auth.service';

@Component({
  selector: 'app-root',
  templateUrl: 'app.component.html',
  styleUrls: ['app.component.scss'],
})
export class AppComponent {
  id: any;
  username: String;

  constructor(
    private residuoService: ResiduoService,
    private router: Router,
    private authService: AuthService
  ) {}

  ngOnInit() {
    if (!this.isLoggedIn()) {
      this.authService.logout();
      this.username = "";
      this.router.navigate(['/']);
    } else {
      this.username = localStorage.getItem('u');
    }

  }

  newResiduo() {
    // Get max residuo Id from the residuo list
    this.residuoService.getMaxResiduoId().subscribe((data) => (this.id = data));
    this.router.navigate(['/residuos', this.id, 'new']);
  }

  isLoggedIn() {
    return this.authService.isLoggedIn();
  }

  logout() {
    this.authService.logout();
    this.username = "";
    this.router.navigate(['/']);
  }
}
