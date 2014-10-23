<?php

namespace Slackiss\Bundle\SocialBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Resource
 * @Vich\Uploadable
 * @ORM\Table(name="resource")
 * @ORM\Entity(repositoryClass="Slackiss\Bundle\SocialBundle\Entity\ResourceRepository")
 */
class Resource
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    public function __construct()
    {
        $this->created = new \DateTime();
        $this->modified = $this->created;
        $this->enabled = true;
        $this->status = true;
        $this->remark = "";
        $this->uid = uniqid(md5(rand()),true);
    }

    /**
     * @ORM\Column(type="string",length=255,name="uid",nullable=false)
     */
    protected $uid;
    /**
     * @var string
     * @Assert\NotBlank(message="资源标题不能为空")
     * @Assert\Length(
     *    max=255,
     *    maxMessage="资源标题不能超过255个字"
     * )
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text",nullable=true)
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="face", type="string", length=255)
     */
    private $face;

    /**
     * @Assert\File(
     *     maxSize="10M",
     *     mimeTypes={"image/png","image/jpeg","image/pjpeg",
     *                          "image/jpg","image/gif"}
     * )
     * @Vich\UploadableField(mapping="resource", fileNameProperty="face")
     *
     * @var File $image
     */
    private $faceAttach;

    public function setFaceAttach($faceAttach)
    {
        $this->faceAttach = $faceAttach;
        if($faceAttach){
            $this->face = $faceAttach->getFileName();
        }
        return $this;
    }

    public function getFaceAttach()
    {
        return $this->faceAttach;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="string", length=255,nullable=true)
     */
    private $picture;

    /**
     * @var string
     *
     * @ORM\Column(name="picture1", type="string", length=255,nullable=true)
     */
    private $picture1;


    /**
     * @Assert\File(
     *     maxSize="10M",
     *     mimeTypes={"image/png","image/jpeg","image/pjpeg",
     *                          "image/jpg","image/gif"}
     * )
     * @Vich\UploadableField(mapping="resource", fileNameProperty="picture")
     *
     * @var File $image
     */
    private $pictureAttach;

    public function setPictureAttach($pictureAttach)
    {
        $this->pictureAttach = $pictureAttach;
        if($pictureAttach){
            $this->picture = $pictureAttach->getFileName();
        }
        return $this;
    }

    public function getPictureAttach()
    {
        return $this->pictureAttach;
    }


    /**
     * @Assert\File(
     *     maxSize="10M",
     *     mimeTypes={"image/png","image/jpeg","image/pjpeg",
     *                          "image/jpg","image/gif"}
     * )
     * @Vich\UploadableField(mapping="resource", fileNameProperty="picture1")
     *
     * @var File $image
     */
    private $picture1Attach;

    public function setPicture1Attach($picture1Attach)
    {
        $this->picture1Attach = $picture1Attach;
        if($picture1Attach){
            $this->picture1 = $picture1Attach->getFileName();
        }
        return $this;
    }

    public function getPicture1Attach()
    {
        return $this->picture1Attach;
    }

    /**
     * @var string
     * @ORM\ManyToOne(targetEntity="Member")
     * @ORM\JoinColumn(name="member_id",referencedColumnName="id")
     */
    private $member;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetimetz")
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified", type="datetimetz")
     */
    private $modified;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean")
     */
    private $status;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enabled", type="boolean")
     */
    private $enabled;

    /**
     * @var string
     *
     * @Assert\NotBlank(message="资源地址不能为空")
     * @Assert\Length(
     *     max=255,
     *     maxMessage="资源地址不能超过2000个字"
     * )
     * @Assert\Url(message="请输入合法的地址")
     * @ORM\Column(name="download", type="string", length=2000)
     */
    private $download;

    /**
     * @var string
     *
     * @Assert\NotBlank(message="资源密码不能为空")
     * @Assert\Length(
     *     max=255,
     *     maxMessage="资源密码不能超过255个字"
     * )
     * @ORM\Column(name="code", type="string", length=255)
     */
    private $code;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Resource
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Resource
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set face
     *
     * @param string $face
     * @return Resource
     */
    public function setFace($face)
    {
        $this->face = $face;

        return $this;
    }

    /**
     * Get face
     *
     * @return string
     */
    public function getFace()
    {
        return $this->face;
    }

    /**
     * Set picture
     *
     * @param string $picture
     * @return Resource
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set member
     *
     * @param string $member
     * @return Resource
     */
    public function setMember($member)
    {
        $this->member = $member;

        return $this;
    }

    /**
     * Get member
     *
     * @return string
     */
    public function getMember()
    {
        return $this->member;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Resource
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set modified
     *
     * @param \DateTime $modified
     * @return Resource
     */
    public function setModified($modified)
    {
        $this->modified = $modified;

        return $this;
    }

    /**
     * Get modified
     *
     * @return \DateTime
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return Resource
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return Resource
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set download
     *
     * @param string $download
     * @return Resource
     */
    public function setDownload($download)
    {
        $this->download = $download;

        return $this;
    }

    /**
     * Get download
     *
     * @return string
     */
    public function getDownload()
    {
        return $this->download;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return Resource
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set uid
     *
     * @param string $uid
     * @return Resource
     */
    public function setUid($uid)
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * Get uid
     *
     * @return string
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Set picture1
     *
     * @param string $picture1
     * @return Resource
     */
    public function setPicture1($picture1)
    {
        $this->picture1 = $picture1;

        return $this;
    }

    /**
     * Get picture1
     *
     * @return string
     */
    public function getPicture1()
    {
        return $this->picture1;
    }
}
