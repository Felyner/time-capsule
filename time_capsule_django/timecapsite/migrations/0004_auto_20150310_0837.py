# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models, migrations


class Migration(migrations.Migration):

    dependencies = [
        ('timecapsite', '0003_auto_20150310_0832'),
    ]

    operations = [
        migrations.AlterField(
            model_name='timecapsule',
            name='tsCreated',
            field=models.DateTimeField(),
            preserve_default=True,
        ),
    ]
