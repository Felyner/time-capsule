class CreateCapsules < ActiveRecord::Migration
  def change
    create_table :capsules do |t|
      t.integer :user_id
      t.string :title
      t.text :description
      t.datetime :unlock

      t.timestamps null: false
    end
  end
end
