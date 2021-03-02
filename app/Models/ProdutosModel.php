<?php 
namespace App\Models;
use CodeIgniter\Model;

class ProdutosModel extends Model
{
    protected $table = 'produtos';
    protected $primaryKey = 'id';
	protected $returnType = 'object';
    protected $allowedFields = ['name','descricao','quantidade'];
}