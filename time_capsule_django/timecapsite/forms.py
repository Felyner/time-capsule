from django.contrib.auth.models import User
from django import forms
from django.core.validators import RegexValidator

class Registration(forms.ModelForm):
	username = forms.CharField(required = True)
	first_name = forms.CharField(min_length = 2)
	last_name = forms.CharField(min_length = 2)
	email = forms.EmailField(required = True)
	password = forms.CharField(widget=forms.PasswordInput())
	class Meta:
		model = User
		fields = ('username', 'first_name','last_name', 'email', 'password')