import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import * as moment from 'moment';
import { AuthService } from '../shared/auth.service';
@Component({
  selector: 'app-registar',
  templateUrl: './registar.page.html',
  styleUrls: ['./registar.page.scss'],
})
export class RegistarPage implements OnInit {
  form: FormGroup;
  pageOrigin = 'Registrar';
  constructor(
    private fb: FormBuilder,
    private authService: AuthService,
    private router: Router
  ) {
    this.form = this.fb.group({
      username: ['', Validators.required],
      password: ['', Validators.required],
      name: ['', Validators.required],
      sector: ['', Validators.required],
      localidad: ['', Validators.required],
      direccion: ['', Validators.required],
    });
  }
  ngOnInit(): void {
    this.form = this.fb.group({
      username: '',
      password: '',
      name: '',
      sector: '',
      localidad: '',
      direccion: '',
    });
  }

  register() {
    const val = this.form.value;

    if (val.username && val.password) {
      this.authService
        .register(
          val.username,
          val.password,
          "empresa",
          val.name,
          val.sector,
          val.localidad,
          val.direccion
        )
        .subscribe(
          (data) => {
            data = {
              ...data,
              u: val.username,
              r: val.type,
            };
            this.authService
              .login(val.username, val.password)
              .subscribe((data) => {
                data = {
                  ...data,
                  u: val.username,
                };
                // Save session: Generate expiration date
                const expire_moment = moment().add(1, 'days');
                data.expires_at = JSON.stringify(expire_moment.valueOf());
                this.authService
                  .role(val.username, val.password)
                  .subscribe((r) => {
                    data = {
                      ...data,
                      r: r[r.length - 1],
                    };
                    this.authService.setSession(data);
                  });
                console.log('User is logged in');
                this.router.navigateByUrl('/');
              });
          },
          () => {
            console.log('User is registered in');
            this.router.navigateByUrl('/');
          }
        );
    }
  }
}
