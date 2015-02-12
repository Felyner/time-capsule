# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models, migrations


class Migration(migrations.Migration):

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='TimeCapsule',
            fields=[
                ('id', models.AutoField(verbose_name='ID', serialize=False, auto_created=True, primary_key=True)),
                ('name', models.CharField(max_length=200)),
                ('date_created', models.DateTimeField(verbose_name=b'date created')),
                ('date_unlock', models.DateTimeField(verbose_name=b'date unlock')),
            ],
            options={
            },
            bases=(models.Model,),
        ),
    ]
