import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FrancaisComponent } from './francais.component';

describe('FrancaisComponent', () => {
  let component: FrancaisComponent;
  let fixture: ComponentFixture<FrancaisComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ FrancaisComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(FrancaisComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
