class CapsulesController < ApplicationController

	before_filter :authenticate_user!

	def index
		@capsules = Capsule.all
	end

	def new
		@capsule = Capsule.new
		@item = Item.new
	end

	def create
		@capsule = Capsule.new(params.require(:capsule).permit(:title, :description, :unlock))
		@capsule.user_id = current_user.id
		@item = Item.new(item_params)
		#if @capsule.save
		#	if @item.save
		#		redirect_to capsules_path, :notice => "Your time capsule has been locked away"
		#	else
		#		render "new"
		#	end
		#else
		#	render "new"
		#end
	end

	def item_params
		params.require(:item).permit(:file) if params[:item]
	end

end
