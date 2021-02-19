<?php

namespace Roloffice\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity (repositoryClass="Roloffice\Repository\OrderRepository")
 * @ORM\Table(name="v6_orders")
 */
class Order {

  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue
   * @var int
   */
  protected $id;

  /**
   * Ordinal number of the document in the current year (redni broj dokumenta u 
   * tekućoj godini)
   * @ORM\Column(type="integer")
   * @var int
   */
  protected $ordinal_num_in_year;

  /**
   * Meny Order belongs to the One Supplier.
   * @ORM\ManyToOne(targetEntity="Client")
   * @ORM\JoinColumn(name="supplier_id", referencedColumnName="id")
   * @var int
   */
  protected $supplier;

  /**
   * Meny Order belongs to the One Project.
   * @ORM\ManyToOne(targetEntity="Project")
   * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
   * @var int
   */
  protected $project;

  /**
   * @ORM\Column(type="string", length=48)
   * @var string
   */
  protected $title;


  // is_archived

  // status

  // note


  public function getId() {
    return $this->id;
  }

  public function setOrdinalNumInYear($ordinal_num_in_year) {
    $this->ordinal_num_in_year = $ordinal_num_in_year;
  }
  
  public function getOrdinalNumInYear() {
    return $this->ordinal_num_in_year;
  }

  public function setProject($project) {
    $this->project = $project;
  }

  public function getProject() {
    return $this->project;
  }

  public function setSupplier($supplier) {
    $this->supplier = $supplier;
  }

  public function getSupplier() {
    return $this->supplier;
  }

  public function setTitle($title) {
    $this->title = $title;
  }
  
  public function getTitle() {
    return $this->title;
  }

}