class CreateItems < ActiveRecord::Migration
  def change
    create_table :items do |t|
      t.integer :capsule_id
      t.string :title
      t.text :description

      t.timestamps null: false
    end
  end
end
