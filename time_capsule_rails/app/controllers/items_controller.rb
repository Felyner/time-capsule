class ItemsController < ApplicationController

	def new
		@item = Item.new
	end

	def create
		capsule_id = params[:capsule_id]
		@item = Item.new(item_params)
		@item.capsule_id = capsule_id
		if @item.save
			redirect_to new_item_path(:capsule_id => capsule_id), :notice => "Item successfully added."
		else
			render "new"
		end
	end

	def item_params
		params.require(:item).permit(:file, :title, :description) if params[:item]
	end

end
